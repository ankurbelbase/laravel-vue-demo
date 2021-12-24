<template>
  <div>
      <router-view />
  </div>
</template>

<script>

import Navbar from './components/Navbar'
import Home from './components/Home'
export default {
    name:'app',
    components:{
        Home
    }
    
}
</script>