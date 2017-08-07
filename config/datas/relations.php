<?php
		$this->hasMany('Bookmarks', [
            'className' => 'Bookmarks',
            'foreignKey' => 'user_id',
            'bindingKey' => 'id',
            'conditions' => [],
            'sort' => [],
            'dependent' => false, 
            'propertyName' => 'bookmarks',
            'saveStrategy' => 'replace', // Either ‘append’ or ‘replace’
        ]);


        $this->belongsTo('Users', [
            'className' => 'Bookmarks',
            'foreignKey' => 'user_id',
            'bindingKey' => 'id',
            'conditions' => [],
            'joinType' => 'INNER',
            'propertyName' => 'bookmarks',
            'strategy' => 'join', // Either ‘join’ or ‘select’
        ]);


        $this->Users->find('all',[
        	'fields' => ['id', 'name']
        	'conditions' => ['id !=' => 1]
        	'order' => ['created' => 'DESC'],
        	'contain' => ['Bookmarks','Bookmarks.Tags'],
        	'limit' => 10,
        	'offset' => 20,
        	])->all();

        OR 

        $this->Users->find()
        		->select(['id', 'name'])
        		->where(['id !=' => 1])
        		->order(['created' => 'DESC']);
        		->contain(['Bookmarks','Bookmarks.Tags'])
        		->all()
        		->toArray();

