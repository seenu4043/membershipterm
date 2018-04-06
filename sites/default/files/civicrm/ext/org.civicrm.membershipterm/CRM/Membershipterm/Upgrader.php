<?php
use CRM_Membershipterm_ExtensionUtil as E;

/**
 * Collection of upgrade steps.
 */
class CRM_Membershipterm_Upgrader extends CRM_Membershipterm_Upgrader_Base {

  // By convention, functions that look like "function upgrade_NNNN()" are
  // upgrade tasks. They are executed in order (like Drupal's hook_update_N).

  public function install() {
    $this->executeSqlFile('sql/install.sql');
  }

  public function uninstall() {
   $this->executeSqlFile('sql/uninstall.sql');
  }

}
