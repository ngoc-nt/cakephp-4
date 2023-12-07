<?php

declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @method \App\Model\Entity\User newEmptyEntity()
 * @method \App\Model\Entity\User newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\User|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('users');
        $this->setDisplayField('email');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->hasOne('Profiles');
        $this->hasMany('Skills');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('last_name')
            ->maxLength('last_name', 255)
            ->allowEmptyString('last_name');

        $validator
            ->scalar('first_name')
            ->maxLength('first_name', 255)
            ->allowEmptyString('first_name');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email')
            ->add('email', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('password')
            ->maxLength('password', 255)
            ->requirePresence('password', 'create')
            ->notEmptyString('password');

        $validator
            ->dateTime('last_login_datetime')
            ->allowEmptyDateTime('last_login_datetime');

        $validator
            ->notEmptyString('status');

        $validator
            ->notEmptyFile('image_file', __('Please choose an image'))
            ->add('image_file', 'file', [
                'rule' => ['uploadError', true],
                'message' => __('The image upload failed'),
            ]);
            // ->notEmptyFile('image_file')
            // ->uploadedFile('image_file', [
            //     'types' => ['image/png'], // only PNG image files
            //     'minSize' => 1024, // Min 1 KB
            //     'maxSize' => 1024 * 1024 // Max 1 MB
            // ])
            // ->add('image_file', 'minSize', [
            //     'rule' => ['imageSize', [
            //         // Min 10x10 pixel
            //         'width' => [Validation::COMPARE_GREATER_OR_EQUAL, 10],
            //         'height' => [Validation::COMPARE_GREATER_OR_EQUAL, 10],
            //     ]]
            // ])
            // ->add('image_file', 'maxSize', [
            //     'rule' => ['imageSize', [
            //         // Max 100x100 pixel
            //         'width' => [Validation::COMPARE_LESS_OR_EQUAL, 100],
            //         'height' => [Validation::COMPARE_LESS_OR_EQUAL, 100],
            //     ]]
            // ])
            // ->add('image_file', 'filename', [
            //     'rule' => function (UploadedFileInterface $file) {
            //         // filename must not be a path
            //         $filename = $file->getClientFilename();
            //         if (strcmp(basename($filename), $filename) === 0) {
            //             return true;
            //         }

            //         return false;
            //     }
            // ])
            // ->add('image_file', 'extension', [
            //     'rule' => ['extension', ['png']] // .png file extension only
            // ]);

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['email']), ['errorField' => 'email']);

        return $rules;
    }
}
