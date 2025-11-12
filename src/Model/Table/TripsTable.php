<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Trips Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\VehiclesTable&\Cake\ORM\Association\BelongsTo $Vehicles
 * @property \App\Model\Table\PaymethodsTable&\Cake\ORM\Association\BelongsTo $Paymethods
 * @property \App\Model\Table\PromotionsTable&\Cake\ORM\Association\BelongsTo $Promotions
 *
 * @method \App\Model\Entity\Trip newEmptyEntity()
 * @method \App\Model\Entity\Trip newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Trip> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Trip get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Trip findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Trip patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Trip> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Trip|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Trip saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Trip>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Trip>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Trip>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Trip> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Trip>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Trip>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Trip>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Trip> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TripsTable extends Table
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

        $this->setTable('trips');
        $this->setDisplayField('status');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Vehicles', [
            'foreignKey' => 'vehicle_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Paymethods', [
            'foreignKey' => 'paymethod_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Promotions', [
            'foreignKey' => 'promotion_id',
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
            ->integer('user_id')
            ->notEmptyString('user_id');

        $validator
            ->integer('vehicle_id')
            ->notEmptyString('vehicle_id');

        $validator
            ->integer('start_station_id')
            ->requirePresence('start_station_id', 'create')
            ->notEmptyString('start_station_id');

        $validator
            ->integer('end_station_id')
            ->allowEmptyString('end_station_id');

        $validator
            ->integer('paymethod_id')
            ->notEmptyString('paymethod_id');

        $validator
            ->integer('promotion_id')
            ->allowEmptyString('promotion_id');

        $validator
            ->dateTime('start_time')
            ->requirePresence('start_time', 'create')
            ->notEmptyDateTime('start_time');

        $validator
            ->dateTime('end_time')
            ->allowEmptyDateTime('end_time');

        $validator
            ->integer('duration_minutes')
            ->allowEmptyString('duration_minutes');

        $validator
            ->decimal('base_rate')
            ->requirePresence('base_rate', 'create')
            ->notEmptyString('base_rate');

        $validator
            ->decimal('total_cost')
            ->allowEmptyString('total_cost');

        $validator
            ->scalar('status')
            ->notEmptyString('status');

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
        $rules->add($rules->existsIn(['vehicle_id'], 'Vehicles'), ['errorField' => 'vehicle_id']);
        $rules->add($rules->existsIn(['paymethod_id'], 'Paymethods'), ['errorField' => 'paymethod_id']);
        $rules->add($rules->existsIn(['promotion_id'], 'Promotions'), ['errorField' => 'promotion_id']);

        return $rules;
    }
}
