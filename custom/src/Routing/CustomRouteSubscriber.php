<?php

namespace Drupal\custom\Routing;

use Drupal\Core\Routing\RouteSubscriberBase;
use Symfony\Component\Routing\RouteCollection;

/**
 * Listens to the dynamic route events.
 */
class CustomRouteSubscriber extends RouteSubscriberBase
{
    /**
     * {@inheritdoc}
     */
    protected function alterRoutes(RouteCollection $collection)
    {
        if($route = $collection->get('system.site_information_settings'))
        {
            $route->setDefault('_form', 'Drupal\custom\Form\CustomSiteInformationForm');
        }
    }
}
?>