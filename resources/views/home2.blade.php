<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div id="component">
        <!-- <form method="POST" action="api/newSubmitForm"> -->
        <h1>REGISTER</h1>
        <input type="text" name="UserName" placeholder="UserName" v-model="user.UserName"/>
        <br/>
        <input type="text" name="Password" placeholder="Password" v-model="user.Password"/>
        <br/>
        <input type="text" name="FirstName" placeholder="FirstName" v-model="user.FirstName"/>
        <br/>
        <input type="text" name="MiddleName" placeholder="MiddleName" v-model="user.MiddleName"/>
        <br/>
        <input type="text" name="LastName" placeholder="LastName" v-model="user.LastName"/>
        <br/>
        <button @click="newSubmitForm" type="submit">Submit</button>
        <!-- </form> -->
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script>
        new Vue({
            el: "#component",
            data: {
                carname: '',
                user:{}
            },
            methods:{
                newSubmitForm(){
                    axios.post('/api/newSubmitForm', this.user).then(res => {
                        console.log(res.data)
                    })
                }

            },

        })
    </script>
</body>
</html>