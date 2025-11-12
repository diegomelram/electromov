<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Paymethods Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\TripsTable&\Cake\ORM\Association\HasMany $Trips
 *
 * @method \App\Model\Entity\Paymethod newEmptyEntity()
 * @method \App\Model\Entity\Paymethod newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Paymethod> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Paymethod get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Paymethod findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Paymethod patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Paymethod> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Paymethod|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Paymethod saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Paymethod>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Paymethod>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Paymethod>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Paymethod> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Paymethod>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Paymethod>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Paymethod>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Paymethod> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PaymethodsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('paymethods');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Trips', [
            'foreignKey' => 'paymethod_id',
        ]);
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
            ->scalar('cardholder_name')
            ->maxLength('cardholder_name', 100)
            ->allowEmptyString('cardholder_name');

        $validator
            ->integer('user_id')
            ->notEmptyString('user_id');

        $validator
            ->scalar('provider_name')
            ->allowEmptyString('provider_name');

        $validator
            ->scalar('card_number')
            ->maxLength('card_number', 20)
            ->allowEmptyString('card_number');

        $validator
            ->scalar('cvv')
            ->maxLength('cvv', 3)
            ->allowEmptyString('cvv');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'), ['errorField' => 'user_id']);

        return $rules;
    }
}
