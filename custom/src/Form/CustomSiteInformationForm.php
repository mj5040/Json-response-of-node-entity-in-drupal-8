<?php

namespace Drupal\custom\Form;

use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Form\ConfigFormBase;
use Drupal\system\Form\SiteInformationForm;

/**
 * Configure site information settings.
 */
class CustomSiteInformationForm extends SiteInformationForm
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(array $form, FormStateInterface $form_state)
    {
        $site_config = $this->config('system.site');
        $form = parent::buildForm($form, $form_state);
            $defaultValue=($site_config->get('siteapikey'))?$site_config->get('siteapikey'):$site_config->get('defaultapimessage');
        $form['site_information']['api_key'] = [
          '#type' => 'textfield',
          '#title' => t('Site API Key'),
          '#default_value' => $defaultValue          
        ];
        $form['actions']['submit']['#value']=t('Update Configuration');    
        return $form;
    }

    /**
     * {@inheritdoc}
     */
    public function submitForm(array &$form, FormStateInterface $form_state)
    {	
        $existingValue=$this->config('system.site')->get('siteapikey');
        $this->config('system.site')
            ->set('siteapikey', $form_state->getValue('api_key'))
            ->save();						
        parent::submitForm($form, $form_state);
        if($existingValue <> $form_state->getValue('api_key'))
            drupal_set_message(t('The Site API Key has been saved successfully.'));			
    }
}
?>