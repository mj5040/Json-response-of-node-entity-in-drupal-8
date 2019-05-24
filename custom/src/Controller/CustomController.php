<?php
/**
 * @file
 * @author Manish Jain
 * Contains \Drupal\custom\Controller\CustomController.
 */
namespace Drupal\custom\Controller;

use Drupal\node\Entity\Node;
use Symfony\Component\HttpFoundation\JsonResponse;
/**
 * Provides route responses for the Custom module.
 */
class CustomController {
  /**
   * Returns JSON Response of node.
   *
   * @return JSON
   */
  public function content($api_key,$node_id) {
    if(is_numeric($node_id) && $node=Node::load($node_id))
    {
        $bundle=$node->bundle();    
    }    
    $siteApiKey = \Drupal::config('system.site')->get('siteapikey');
    if(($api_key != $siteApiKey) || (!isset($bundle) || $bundle != 'page'))
    {
        throw new \Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException();
    }
    
    $data = array(
        'type' => $node->get('type')->target_id,
        'id' => $node->get('nid')->value,
        'title' => $node->get('title')->getValue()[0]['value'],
        'body' => $node->get('body')->getValue()[0]['value'],
    );
    return new JsonResponse($data);
  }
}
?>