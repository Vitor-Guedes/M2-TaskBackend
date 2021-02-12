# Hibridi Seo

Módulo magento, cria meta tag hreflang para multi-store de acordo com a loja atual.

Exemplo: 
```
<link rel="alternate" hreflang=“pr-br" href="https://www.hibrido.com.br/sobre-nos" />
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
Colocar este conteúdo em qualquer bloco cms que desejar
```
{{block class="Hibridi\Seo\Block\SeoLanguage" template="Hibridi_Seo::switch/languages.phtml"}}
```