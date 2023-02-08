<template>
  <div class="items">
            <router-link :to="'/detail/' + id">
      <div class="image">
          <img class="object-cover" :src="gambar" alt="">
      </div>

      <div class="detail flex bg-white">
          <div class="details">
              <h5>{{tanggal}}</h5>
              <h4 class="name">{{nama}}</h4>
              <h4>#00{{id}}</h4>
          </div>

          <div class="type">
              <div class="bg-green-100">
                  <h5>{{tipe}}</h5>
              </div>

              <div class="bg-blue-100">
                  <h5>{{status}}</h5>
              </div>
          </div>
      </div>
            </router-link>
  </div>
</template>

<script>
export default {
    props: {
        gambar: String,
        tanggal: String,
        nama: String,
        id: String,
        tipe: String,
        status: String
    }
}
</script>

<style>
.items{
    cursor: pointer;
    border: 1.8px solid rgba(0, 0, 0, 0.2);
}
.items .details h5{
    color: black;
    opacity: 0.2;
    font-weight: 500;
}

.items .details .name{
    margin: 3px 0;
}

.items img{
    width: 100%;
    height: 180px;
}
.items .image{
    height: 180px;
}
.items .detail{
    justify-content: space-between;
    align-items: flex-end;
    border-top: 1.8px solid rgba(0, 0, 0, 0.2);
    padding: 8px;
}

.items .detail .type div{
    color: rgba(0, 0, 0, 0.8);
    text-align: center;
    font-size: 14px;
    margin-bottom: 5px;
    padding: 2px 20px;
    border-radius: 3px;
}

</style>