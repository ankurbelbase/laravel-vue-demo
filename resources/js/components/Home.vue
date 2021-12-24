<template>
  <div class="container">
      <div class="position-ref full-height">
          <div class="content">
              <h2> Rides Details</h2>
            
                <p v-for="(ride, index) in rides.slice(0, 1)" :key="ride.id">
                    Distance (m): {{ index }} - {{ ride.distance }}<br>
                    Duration (s): {{ ride.duration_s}}<br>
                    Duration (km/hr): {{ ride.average_speed}}<br>
                    Started at : {{ ride.created_at}}<br>
                </p>
              
              <div class="map">
                  <gmap-map
                        :center="mapCenter"
                        :zoom='10'
                        style="width:100%; height:440px;"
                    >
                    <gmap-info-window
                        :options="infoWindowOption"
                        :position="infoWindowPosition"
                        :opened="infoWindowOpened"
                        @closeClick="handleInfoWindowClose"
                    >
                    <div class="info-window">
                        Battery: <h5 v-text="activeRide.battery"></h5>
                    </div>
                    </gmap-info-window>
                    <gmap-marker
                        v-for="(r) in rides"
                        :key="r.id" 
                        :position="getPosition(r)"
                        :clickable="true"
                        :draggable="false"
                        @click="handleMarkerClicked(r)"
                    ></gmap-marker>
                    </gmap-map>
              </div>
          </div>
      </div>
  </div>
</template>

<script>
export default {
    name:'Home',
    created(){
        this.loadData();
    },
    methods:{
        loadData(){
            let url = this.url + '/api/ride-details';
            this.axios.get(url).then(response => {
                this.rides = response.data
                // console.log(this.rides)
                });
                },
        getPosition(r){
            return {
                lat: parseFloat(r.latitude),
                lng: parseFloat(r.longitude)
                }
            },
        handleMarkerClicked(r){
            this.activeRide = r;
            this.infoWindowOpened = true;
        },
        handleInfoWindowClose(){
            this.activeRide = {};
            this.infoWindowOpened = false;
        }
        },
    mounted(){
        console.log('Ride Details Mounted');
        },
    data(){
        return {
            url: document.head.querySelector('meta[name="url"]').content,
            rides:[],
            infoWindowOption:{
                pixelOfset:{
                    width: 0,
                    height:-35
                }
            },
            activeRide:{},
            infoWindowOpened:false  
        }
    },
    
    computed:{
        mapCenter(){
            if (!this.rides.length){
                return {
                    lat:10,
                    lng: 10
                }
            }
            return {
                lat: parseFloat(this.rides[0].latitude),
                lng: parseFloat(this.rides[0].longitude)
            }

        },
        infoWindowPosition(){
            return {
                lat:parseFloat(this.activeRide.latitude),
                lng:parseFloat(this.activeRide.longitude),
            };
        }, 
    }
}
</script>