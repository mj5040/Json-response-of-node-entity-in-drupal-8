# Custom Module
This module alters the site information form and resturns the json response of given node of page bundle.

### Installing the Custom Module

1. Copy/upload the custom module to the modules directory of your Drupal
   installation.

2. Enable the 'Custom' module. 
   (/admin/modules)

3. Navigate to 'Basic site settings' and see a new field 'Site API Key' at site settings page (/admin/config/system/site-information). 
   
4. 'Save configuration' button text changed to 'Update Configuration'.

5. Site API key data saved as a variable siteapikey. 

6. JSON representation of a node data can be found at /page_json/{api_key}/{node_id}

    - {api_key}: It refers to 'Site API Key' saved in site configuration.
    
    - {node_id}: Node id of a node with content type 'Page'
    
    In case {api_key} is wrong or {node_id} is not related to 'Page' content type, it will render 'Access Denied' Page.
