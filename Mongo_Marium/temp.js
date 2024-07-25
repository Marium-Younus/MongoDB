db.teacher.aggregate([ {$match:{gender:"male"}},{$group:{_id:"$age",countTeacherAgeGroup:{ $sum:1 }}},{$sort:{countTeacherAgeGroup:-1}} ]) 


db.createCollection("nonfiction",{
 validator:{
    $jsonSchema:{
        required :['name','price'],
        properties:{
            name:{
                bsonType:'string',
                description:'must be a string and required'
            },
            price:{
                bsonType:'number',
                description:'must be a number and required'
            },

        }
    }
 } ,
 validationAction: 'error'
}),

db.runCommand({
    collMod:'nonfiction',
    validator:{
        $jsonSchema:{
            required :['name','price','author'],
            properties:{
                name:{
                    bsonType:'string',
                    description:'must be a string and required'
                },
                price:{
                    bsonType:'number',
                    description:'must be a number and required'
                },
                author:{
                    bsonType:'array',
                    description:'must be an array and isrequired',
                    items:{
                        bsonType:'object',
                        required :['a_name','a_email'],
                        properties:{
                            a_name:{
                                bsonType:'string',
                            },
                            a_email:{
                                bsonType:'string',
                            }
                     }
                }  
            }
        }
     }
    }
 
})

db.teacher.aggregate([ {$match:{gender:"male"}},{$group:{_id:"$age",countTeacherAgeGroup:{ $sum:1 }}} ])   t:}ttkjfdkghdfjkghdfjkhgjhdfjghfjdhcls ])                                                                                                                                                          