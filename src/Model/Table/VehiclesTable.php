<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Vehicles Model
 *
 * @property \App\Model\Table\ModelsTable&\Cake\ORM\Association\BelongsTo $Models
 * @property \App\Model\Table\TripsTable&\Cake\ORM\Association\HasMany $Trips
 *
 * @method \App\Model\Entity\Vehicle newEmptyEntity()
 * @method \App\Model\Entity\Vehicle newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Vehicle> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Vehicle get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Vehicle findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Vehicle patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Vehicle> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Vehicle|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Vehicle saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Vehicle>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Vehicle>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Vehicle>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Vehicle> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Vehicle>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Vehicle>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Vehicle>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Vehicle> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class VehiclesTable extends Table
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

        $this->setTable('vehicles');
        $this->setDisplayField('serial_number');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Models', [
            'foreignKey' => 'model_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Trips', [
            'foreignKey' => 'vehicle_id',
        ]);
        // Association 2: Current Station (Use LEFT Join)
        $this->belongsTo('Stations', [
            'foreignKey' => 'current_station_id', // Must match the field name
            'joinType' => 'LEFT', // Allows NULLs (vehicles in use)
            // Set the alias (association name) to 'CurrentStations' to avoid conflict if you later add 'StartStation' or 'EndStation'
            'className' => 'Stations'
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
            ->integer('model_id')
            ->notEmptyString('model_id');

        $validator
            ->scalar('serial_number')
            ->maxLength('serial_number', 20)
            ->requirePresence('serial_number', 'create')
            ->notEmptyString('serial_number')
            ->add('serial_number', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('status')
            ->notEmptyString('status');

        $validator
            ->integer('battery_level')
            ->notEmptyString('battery_level');

        $validator
            ->decimal('latitude')
            ->allowEmptyString('latitude');

        $validator
            ->decimal('longitude')
            ->allowEmptyString('longitude');

        $validator
            ->integer('current_station_id')
            ->allowEmptyString('current_station_id');

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
        $rules->add($rules->isUnique(['serial_number']), ['errorField' => 'serial_number']);
        $rules->add($rules->existsIn(['model_id'], 'Models'), ['errorField' => 'model_id']);

        return $rules;
    }
}
