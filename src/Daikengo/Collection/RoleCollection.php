<?php

/**
 * @file RoleCollection.php
 * @brief This file contains the RoleCollection class.
 * @details
 * @author Filippo F. Fadda
 */


namespace Daikengo\Collection;


use Meta\MetaCollection;

use Daikengo\User\IUser;
use Daikengo\Role\IRole;


/**
 * @brief This class is used to represent a collection of roles.
 * @nosubgrouping
 */
final class RoleCollection extends MetaCollection {

  /**
   * @var IUser $user
   */
  protected $user;


  /**
   * @brief Creates a new collection of roles.
   * @param string $name Collection's name.
   * @param array $meta Array of metadata.
   */
  public function __construct($name, array &$meta) {
    parent::__construct($name, $meta);
  }


  /**
   * @brief Grants the specified role to the current member.
   * @details The algorithm discards any role when a more important one has been granted to the member. That means you
   * can't add the Moderator role to an Admin, etc. You can also grant multiple roles to a member, to assign special
   * permissions.
   * @param IRole $role A role object.
   */
  public function grant(IRole $role) {
    // Checks if the same role has been already assigned to the member.
    if ($this->exists($role))
      return;

    $roles = $this->meta[$this->name];

    foreach ($roles as $name => $class) {

      if (is_subclass_of($class, get_class($role))) {
        // If a subclass of `$role` exists for the current collection then the function returns, because a more
        // important role has been already assigned to the member.
        return;
      }
      elseif (is_subclass_of($role, $class, FALSE)) {
        // If `$role` is an instance of a subclass of any role previously assigned to the member that means the new role
        // is more important and the one already assigned must be removed.
        unset($this->meta[$this->name][$name]);
      }

    }

    // Uses as key the role's name and as value its class.
    $this->meta[$this->name][$role->getName()] = get_class($role);
  }


  /**
   * @brief Revokes the specified role for the current member.
   * @param IRole $role A role object.
   */
  public function revoke(IRole $role) {
    if ($this->exists($role))
      unset($this->meta[$this->name][$role->getName()]);
  }


  /**
   * @brief Returns `true` if the role is already present, `false` otherwise.
   * @param IRole $role A role object.
   * @return bool
   */
  public function exists(IRole $role) {
    return isset($this->meta[$this->name][$role->getName()]);
  }


  /**
   * @brief Returns `true` if at least one of the role associated to the current user is an instance of subclass (or an
   * instance of the same class) of the specified role object, `false` otherwise.
   * @param IRole $role A role object.
   * @param bool $orEqual (optional) When `false` doesn't check if the role is an instance of the same class.
   * @return bool
   */
  public function areSuperiorThan(IRole $role, $orEqual = TRUE) {
    $result = FALSE;

    $roles = $this->meta[$this->name];

    $roleClass = get_class($role);

    foreach ($roles as $name => $class) {

      if (is_subclass_of($class, $roleClass) or ($orEqual && ($class === $roleClass))) {
        $result = TRUE;
        break;
      }

    }

    return $result;
  }

}