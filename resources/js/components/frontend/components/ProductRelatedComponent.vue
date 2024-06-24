<template>
    <LoadingComponent :props="loading" />
    <section class="mb-10 sm:mb-20">
        <div class="container">
            <Swiper
                v-if="products.length > 0"
                :slides-per-view="5"
                :speed="1000"
                :loop="true"
                :navigation="true"
                :pagination="false"
                :autoplay="{ delay: 2500 }"
                :modules="modules"
                :breakpoints="{
                  320: {
                    slidesPerView: 1,
                    spaceBetween: 10
                  },
                  480: {
                    slidesPerView: 2,
                    spaceBetween: 20
                  },
                  768: {
                    slidesPerView: 3,
                    spaceBetween: 30
                  },
                  1024: {
                    slidesPerView: 4,
                    spaceBetween: 40
                  },
                  1200: {
                    slidesPerView: 5,
                    spaceBetween: 10
                  }
                }"
                class="banner-swiper">
                <SwiperSlide v-for="product in products">
                    <CardComponent :product="product" />
                </SwiperSlide>
            </Swiper>
        </div>
    </section>
</template>

<script>
import 'swiper/css';
import {Navigation, Pagination, Autoplay} from 'swiper/modules';
import {Swiper, SwiperSlide} from 'swiper/vue';
import statusEnum from "../../../enums/modules/statusEnum";
import LoadingComponent from "../components/LoadingComponent";
import ProductListComponent from "../components/ProductListComponent.vue";
import CardComponent from "../components/CardComponent.vue";


export default {
    name: "ProductRelatedComponent",
    components: {
        CardComponent,
        ProductListComponent,
        Swiper,
        SwiperSlide,
        LoadingComponent
    },
    setup() {
        return {
            modules: [Navigation, Pagination, Autoplay],
        }
    },
    data() {
        return {
            loading: {
                isActive: false
            },
            sliderProps: {
                search: {
                    paginate: 0,
                    order_column: 'id',
                    order_type: 'desc',
                    status: statusEnum.ACTIVE
                }
            },
            expireDate: '2024-06-15T00:00:00', // Set your expiry date here
            hours: 0,
            minutes: 0,
            seconds: 0
        }
    },
    computed: {
        products: function () {
            return this.$store.getters["frontendProduct/popularProducts"];
        },
    },
    mounted() {
        this.loading.isActive = true;
        this.$store.dispatch("frontendProduct/popularProducts", {
            paginate: 0,
            rand: 8
        }).then(res => {
            this.loading.isActive = false;
        }).catch((err) => {
            this.loading.isActive = false;
        });

        // Calculate time left immediately and every second
        this.calculateTimeLeft();
        setInterval(this.calculateTimeLeft, 1000);
    },
    methods: {
        calculateTimeLeft() {
            const currentTime = new Date();
            const expireTime = new Date(this.expireDate);
            const difference = expireTime - currentTime;

            if (difference > 0) {
                this.hours = Math.floor((difference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                this.minutes = Math.floor((difference % (1000 * 60 * 60)) / (1000 * 60));
                this.seconds = Math.floor((difference % (1000 * 60)) / 1000);

                // Format hours, minutes, and seconds to always display two digits
                this.hours = this.formatNumber(this.hours);
                this.minutes = this.formatNumber(this.minutes);
                this.seconds = this.formatNumber(this.seconds);
            } else {
                this.hours = "00";
                this.minutes = "00";
                this.seconds = "00";
            }
        },
        formatNumber(number) {
            return number < 10 ? '0' + number : number;
        }
    }
}
</script>
