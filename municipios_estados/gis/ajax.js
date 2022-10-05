$(document).ready(function(){
    $.get('./gis/config.json', function(data){
        //---- PARAMETRIZAÇÃO DAS VARIAVEIS CONSTANTES DAS FUNÇÕES ------
        //---atribuição de variaveis relacionado ao json para o principal
        let tableDB_P = data['principal']['tableDB']
        let divId_P = data['principal']['divId']
        let parentTag_P = data['principal']['parentTag']
        let childTag_P = data['principal']['childTag']
        let label_P = data['principal']['label']
        let caminho_P = data['principal']['caminho']
        let extencaoArquivo_P = data['principal']['extencaoArquivo']
        let colunaFiltro_P = data['principal']['colunaFiltro']
        let colunaLabel_P = data['principal']['colunaLabel']

        //---atribuição de variaveis relacionado ao json para o secundário
        let tableDB_S = data['secundario']['tableDB']
        let divId_S = data['secundario']['divId']
        let parentTag_S = data['secundario']['parentTag']
        let childTag_S = data['secundario']['childTag']
        let label_S = data['secundario']['label']
        let caminho_S = data['secundario']['caminho']
        let extencaoArquivo_S = data['secundario']['extencaoArquivo']
        let colunaFiltro_S = data['secundario']['colunaFiltro']
        let colunaLabel_S = data['secundario']['colunaLabel']

        // CONFIGURA OS 'NAME', 'ID' E 'TYPE' DA TAG SELECT PARA FICAR PRONTO PARA RECONHECIMENTO DO PHP PARA O DB
        //---Principal
        let url_P = caminho_P + tableDB_P + extencaoArquivo_P//caminho do arquivo php de consulta
        let selecionaTag_P = $(divId_P).children().children()[0]//seleciona a tag alvo para alteração do 'id','name' e 'type
        $(selecionaTag_P).attr('name',colunaFiltro_P)//atribui ao name o nomeda coluna do banco de dados
        $(selecionaTag_P).attr('id',tableDB_P)//atribui ao id o nome da tabela do banco de dados
        
        //---secundário
        let url_S = caminho_S + tableDB_S + extencaoArquivo_S//caminho do arquivo php de consulta
        let selecionaTag_S = $(divId_S).children().children()[1]//seleciona a tag alvo para alteração do 'id','name' e 'type
        $(selecionaTag_S).append('<'+childTag_S+'>')//CRIA A TAG '<option>' para o secundário
        $(selecionaTag_S).children(childTag_S).html(label_S)//atribui um 'text' para a label 
        $(selecionaTag_S).attr('name',colunaFiltro_S)//atribui ao name o nomeda coluna do banco de dados
        $(selecionaTag_S).attr('id',tableDB_S)//atribui ao id o nome da tabela do banco de dados
        
        //VARIAVEIS PARA A INJEÇÃO NO HTML
        let tagPrincipal = $(divId_P).children().children('#'+tableDB_P);//define a tag que será mostrada o foreach
        let tagSecundario = $(divId_S).children().children('#'+tableDB_S);//define a tag que será mostrada o foreach
        console.log(selecionaTag_P)
        console.log(tagPrincipal)
        
        //---CONFIGURAR SELECT PRINCIPAL-------
        $.getJSON(url_P, function(data){
                option = ''
                for(let i in data){
                    option += '<option value=' +data[i][colunaFiltro_P]+ '>' +data[i][colunaLabel_P]+ '</option>'
                }
                optionLabel = '<option>' + label_P + '</option>'
                tagPrincipal.html(optionLabel + option)
        })
        
        //carregar estados
        //quando escolher o estado carregar o ajax de municipios
        $(tagPrincipal).change(function(){
            $.ajax({
                type:'GET',
                url: url_S,
                dataType:'json',
                success: function(data){
                    option = ''
                    for(let i in data){
                        //fazendo filtro do estado selecionado
                        if( $(tagPrincipal).val() == data[i][colunaFiltro_S])
                        option += '<option value=' +data[i][colunaFiltro_S]+ '>' +data[i][colunaLabel_S]+ '</option>'
                    }
                    let optionLabel = '<option>' + label_S + '</option>'
                    tagSecundario.html(optionLabel + option)
                },
                error: function(){
    
                }
            })
        })
    })
})