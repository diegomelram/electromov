<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Promotions Model
 *
 * @property \App\Model\Table\TripsTable&\Cake\ORM\Association\HasMany $Trips
 *
 * @method \App\Model\Entity\Promotion newEmptyEntity()
 * @method \App\Model\Entity\Promotion newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Promotion> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Promotion get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Promotion findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Promotion patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Promotion> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Promotion|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Promotion saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Promotion>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Promotion>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Promotion>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Promotion> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Promotion>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Promotion>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Promotion>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Promotion> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PromotionsTable extends Table
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

        $this->setTable('promotions');
        $this->setDisplayField('code');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Trips', [
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
            ->scalar('code')
            ->maxLength('code', 50)
            ->requirePresence('code', 'create')
            ->notEmptyString('code')
            ->add('code', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->decimal('discount_percentage')
            ->requirePresence('discount_percentage', 'create')
            ->notEmptyString('discount_percentage');

        $validator
            ->boolean('status')
            ->allowEmptyString('status');

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
        $rules->add($rules->isUnique(['code']), ['errorField' => 'code']);

        return $rules;
    }
}
