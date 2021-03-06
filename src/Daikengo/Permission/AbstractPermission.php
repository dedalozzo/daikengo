<?php

/**
 * @file Permission/AbstractPermission.php
 * @brief This file contains the AbstractPermission class.
 * @details
 * @author Filippo F. Fadda
 */


namespace Daikengo\Permission;


use Daikengo\Role\IRole;


/**
 * @brief Abstract class that implements the IPermission interface. Since abstract, this class cannot be instantiated.
 * @nosubgrouping
 */
abstract class AbstractPermission implements IPermission {

  /**
   * @var IRole $role
   */
  protected $role;


  /**
   * @var string $name
   */
  protected $name;


  /**
   * @brief Constructor is protected so it can't call explicitly from outside.
   * @attention Subclasses must override this method and make it public.
   */
  protected function __construct() {
    $this->name = lcfirst(preg_replace('/Permission$/', '', get_class($this)));
  }


  /**
   * @brief Calls is triggered when invoking inaccessible methods in an object context.
   * @param string $name The name of the method being called.
   * @param array $arguments An enumerated array containing the parameters passed to the method.
   * @return mixed
   */
  public function __call($name, array $arguments) {
    if (is_callable($this->$name))
      return call_user_func($this->$name, $arguments);
    else
      throw new \RuntimeException("Method {$name} does not exist.");
  }


  /**
   * @brief Sometime a programmer needs to define a new special role, and eventually a set of permissions to check the
   * access, for this particular role, to any existent resource. Through this technique the programmer may define
   * dynamic methods to check the permissions for a particular role.
   * @param string $name The name of the method being called.
   * @param callable $value A closure.
   * @details In the following example we define the method `checkForGodRole`, to extend the `ImpersonatePermission`
   * class such as God will be able to impersonate anyone.
     @code
       // We assume `$member` is an instance of the `Member` class.
       $permission = new ImpersonatePermission($member);

       $permission->checkForGodRole = function() {
         return TRUE;
       };

       // Prints `true`.
       print $permission->checkForGodRole();
     @endcode
   */
  public function __set($name, $value) {
    $this->$name = is_callable($value) ? $value->bindTo($this, $this) : $value;
  }


  public function setRole(IRole $role) {
    $this->role = $role;
  }


  public function getRole() {
    return $this->role;
  }

}