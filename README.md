# M2-TaskBackend
Adiciona meta tag hreflang em paginas cms multi-store.
Módulo magento, cria meta tag hreflang para multi-store de acordo com a loja atual.

Exemplo: 
```
<link rel="alternate" hreflang=“pt-br" href="https://www.hibrido.com.br/sobre-nos" />
<link rel="alternate" hreflang=“en-us" href="https://www.hibrido.com.br/about-us" />
```

## Como habilitar o módulo ao Magento
* Copiar os arquivos para a pasta app/code.
* Na pasta raiz do projeto
    * Digitar o comando: 
        > bin/magento module:status
    * Identificar o Módulo Hibridi_Seo em <font color="gree"> **List of disabled modules** </font>
    * Hailitar o módulo com o comando:
        > bin/magento module:enable Hibridi_Seo
    * Então execurar o comando
        > bin/magento setup:di:compile
    * E por fim realizar a limpeza de cache caso necessário
        > bin/magento cache:clean

### Adicionar
Colocar este conteúdo no bloco head
```
{{block class="Hibridi\Seo\Block\SeoLanguage" template="Hibridi_Seo::switch/languages.phtml"}}
```
E inserir o bloco head no layout design de qualquer página cms que tenha sido atribuída a mais de uma loja.
