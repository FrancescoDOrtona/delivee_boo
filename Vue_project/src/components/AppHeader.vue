<template>
    <header>
        <div class="header-logo">
            <img src="../../public/logo-teal.svg" alt="">
        </div>
        <div class="header-buttons">
            <div class="dropdown">
                <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-link"></i> Links
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </div>
        </div>
    </header>
    
    
</template>

<script>
    export default {
        
    }

</script>

<style lang="scss" scoped>
header{
    background-color: black;
    display: flex;
    justify-content: space-between;
    padding: 20px;
}

.header-logo{
    margin-left: 50px;
    img{
        width: 150px;
    }
}
</style>