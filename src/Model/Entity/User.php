<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string|null $last_name
 * @property string|null $first_name
 * @property string $email
 * @property string $password
 * @property \Cake\I18n\FrozenTime|null $last_login_datetime
 * @property int $status
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime|null $modified
 */
class User extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'last_name' => true,
        'first_name' => true,
        'email' => true,
        'password' => true,
        'last_login_datetime' => true,
        'status' => true,
        'profile' => true,
        'created' => true,
        'modified' => true,
        'image_file' => true,
        'skills' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array<string>
     */
    protected $_hidden = [
        'password',
    ];

    protected function _setPassword(string $password)
    {
        if (strlen($password) > 0) {
          return (new DefaultPasswordHasher())->hash($password);
        }
    }
}
