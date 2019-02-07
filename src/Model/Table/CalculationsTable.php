<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Calculations Model
 *
 * @method \App\Model\Entity\Calculation get($primaryKey, $options = [])
 * @method \App\Model\Entity\Calculation newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Calculation[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Calculation|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Calculation|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Calculation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Calculation[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Calculation findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CalculationsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('calculations');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', 'create');

        $validator
            ->date('start_date')
            ->requirePresence('start_date', 'create')
            ->allowEmptyDate('start_date', false);

        $validator
            ->date('end_date')
            ->requirePresence('end_date', 'create')
            ->allowEmptyDate('end_date', false);

        $validator
            ->scalar('result')
            ->maxLength('result', 255)
            ->requirePresence('result', 'create')
            ->allowEmptyString('result', false);

        return $validator;
    }
	
	public function findResult(Query $query, array $options)
    {   
	   
	    if(isset($options['start_date'])){
			$query->where([
				$this->alias() . '.start_date' => $options['start_date']
			]);
		}
		
		if(isset($options['end_date'])){
			$query->where([
				$this->alias() . '.end_date' => $options['end_date']
			]);
		}
        
        return $query;
    }
}
