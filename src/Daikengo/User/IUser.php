<?php

/**
 * @file IUser.php
 * @brief This file contains the IUser class.
 * @details
 * @author Filippo F. Fadda
 */


//! Classes and interfaces to represent users and members.
namespace Daikengo\User;


use Daikengo\Permission\IPermission;
use Daikengo\Collection\RoleCollection;


/**
 * @brief This interface defines common methods between every class who represent an user.
 * @nosubgrouping
 */
interface IUser {


  /**
   * @brief Returns the user id if any, otherwise `null`.
   * @return mixed
   */
  function getId();


  /**
   * @brief Returns `true` if the provided user id matches the current one, `false` otherwise.
   * @details This method is useful to check the ownership of a post, for example.
   * @param mixed $id The id to match.
   * @return bool
   */
  function match($id);


  /**
   * @brief Returns `true` if the provided user has the permission to execute a specific operation, `false` otherwise.
   * @param IPermission $permission A permission.
   * @return bool
   */
  function has(IPermission $permission);


  /**
   * @brief Returns `true` in case the user is a guest.
   * @return bool
   */
  function isGuest();


  /**
   * @brief Returns `true` in case the user is a community's member.
   * @return bool
   */
  function isMember();


  /**
   * @brief Returns a collection of roles.
   * @return RoleCollection
   */
  function getRoles();

}