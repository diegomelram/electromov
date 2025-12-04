<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Models Model
 *
 * @property \App\Model\Table\VehiclesTable&\Cake\ORM\Association\HasMany $Vehicles
 *
 * @method \App\Model\Entity\Model newEmptyEntity()
 * @method \App\Model\Entity\Model newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Model> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Model get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Model findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Model patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Model> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Model|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Model saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Model>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Model>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Model>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Model> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Model>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Model>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Model>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Model> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ModelsTable extends Table
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

        $this->setTable('models');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Vehicles', [
            'foreignKey' => 'model_id',
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
            ->scalar('name')
            ->maxLength('name', 100)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('type')
            ->maxLength('type', 50)
            ->requirePresence('type', 'create')
            ->notEmptyString('type');

        $validator
            ->scalar('brand')
            ->maxLength('brand', 100)
            ->allowEmptyString('brand');

        $validator
            ->decimal('rate_per_minute')
            ->allowEmptyString('rate_per_minute');

        return $validator;
    }
}
