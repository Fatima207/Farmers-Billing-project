<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    
    <script type="importmap">
        {
            "imports": {
                "vue": "https://cdnjs.cloudflare.com/ajax/libs/vue/3.5.4/vue.cjs.js"
            }
        }
    </script>
</head>
<body>
    <div class="app">
        <h1>Ci3</h1>
    </div>
    <script>
        import {createApp} from 'vue';
const app = createApp ({
    setup(){
        const test = ref("hi");
        return {
            test
        }
    }
});
app.mount('#app');
</script>
</body>
</html>