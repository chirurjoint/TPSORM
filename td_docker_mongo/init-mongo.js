db.createUser (
    {
        user : "sdalponte",
        pwd : "zinzin666",
        roles : [
            {
                role : "readWrite",
                db : "firstmongodb"
            }
        ]
    }
)
