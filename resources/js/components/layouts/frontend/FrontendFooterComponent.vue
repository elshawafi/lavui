<template>
    <LoadingComponent :props="loading" />

    <footer class="pt-12 bg-secondary" style="background:#F7F7F7;">
        <div class="container">
            <h2 class="fent mb-5" style="font-size: 19px;">{{ $t('label.followlavui') }}</h2>
            <nav v-if="setting.social_media_facebook || setting.social_media_twitter || setting.social_media_instagram || setting.social_media_youtube || setting.social_media_linkedin || setting.social_media_youtube || setting.social_media_snapchat || setting.social_media_tiktok|| setting.social_media_clubhouse"
                 class="flex flex-wrap items-center gap-6 tablet:justify-center" style="justify-content: space-between">
                <div class="flex flex-wrap items-center gap-6 tablet:justify-center">
                    <a v-if="setting.social_media_linkedin" target="_blank" :href="setting.social_media_linkedin"
                       class="lab-fill-linkedin w-7 h-7 !leading-7 text-center text-sm text-secondary"
                       style="font-size: 22px"></a>

                    <a v-if="setting.social_media_twitter" target="_blank" :href="setting.social_media_twitter"
                       class="lab-fill-x w-7 h-7 !leading-7 text-center text-sm text-secondary"
                       style="font-size: 22px"></a>

                    <a v-if="setting.social_media_instagram" target="_blank" :href="setting.social_media_instagram"
                       class="lab-fill-instagram w-7 h-7 !leading-7 text-center text-sm text-secondary"
                       style="font-size: 22px"></a>

                    <a v-if="setting.social_media_youtube" target="_blank" :href="setting.social_media_youtube"
                       class="lab-fill-youtube w-7 h-7 !leading-7 text-center text-sm text-secondary"
                       style="font-size: 22px"></a>
                    <a v-if="setting.social_media_facebook" target="_blank" :href="setting.social_media_facebook"
                       class="lab-fill-facebook w-7 h-7 !leading-7 text-center text-sm text-secondary"
                       style="font-size: 22px"></a>
                    <a v-if="setting.social_media_snapchat" target="_blank" :href="setting.social_media_snapchat"
                       class="lab-fill-snapchat w-7 h-7 !leading-7 text-center text-sm text-secondary"
                       style="font-size: 22px"></a>
                    <a v-if="setting.social_media_tiktok" target="_blank" :href="setting.social_media_tiktok"
                       class="lab-fill-tiktok w-7 h-7 !leading-7 text-center text-sm text-secondary"
                       style="font-size: 22px"></a>
                    <a v-if="setting.social_media_clubhouse" target="_blank" :href="setting.social_media_clubhouse"
                       class="lab-fill-clubhousew-7 h-7 !leading-7 text-center text-sm text-secondary"
                       style="font-size: 22px"></a>
                </div>
                <form @submit.prevent="saveSubscription" style="width:415px;display: inline-block;direction: rtl" class="mt-5 mb-6" >
                    <h2 class="mb-5" style="font-size: 19px;text-align: center; ">{{ $t('label.subscribetothenewsletter') }}</h2>
                    <br>
                    <div class="w-full h-10 bg-white flex">
                        <input style="margin-bottom: 19px;" type="email" v-model="subscriptionProps.post.email" :placeholder="insertYourEmail"
                               class="w-full h-full pl-3 pr-2">
<!--                               :placeholder="$t('label.your_email_address')"-->

                        <button type="submit" style="background-color:#4C338C; color: white;"
                                class="text-xs font-semibold capitalize px-3 h-full text-white">
<!--                            {{ $t('button.subscribe') }}-->
                            ارسال
                        </button>
                    </div>
                </form>

            </nav>

            <div style="height: 50px"></div>

            <div class="row border-t">
                <div class="col-12 md:col-3 lg:col-4 mb-6 md:mb-0" dir="rtl">
                    <div class="tablet:text-center tablet:mx-auto w-full max-w-xs" dir="rtl">
                        <router-link :to="{ name: 'frontend.home' }">
                            <!--                    <img class="mb-8 w-36" :src="setting.theme_footer_logo" alt="logo" loading="lazy">-->
                            <img class="mb-8 w-36" src="/logo.png" alt="logo" loading="lazy">
                        </router-link>

                        <p>testtesttesttesttesttesttesttesttesttesttesttesttes
                           </p>

                        <!--                        <form @submit.prevent="saveSubscription" class="mt-5 mb-6 block">-->
                        <!--                            <label class="mb-3 font-medium text-white">-->
                        <!--                                {{ $t('message.subscribe_to_our_newsletter') }}-->
                        <!--                            </label>-->
                        <!--                            <div class="flex w-full h-10 rounded-3xl p-1 bg-white">-->
                        <!--                                <input type="email" v-model="subscriptionProps.post.email"-->
                        <!--                                    :placeholder="$t('label.your_email_address')" class="w-full h-full pl-3 pr-2">-->
                        <!--                                <button type="submit"-->
                        <!--                                    class="text-xs font-semibold capitalize flex-shrink-0 px-3 h-full rounded-3xl bg-primary text-white">-->
                        <!--                                    {{ $t('button.subscribe') }}-->
                        <!--                                </button>-->
                        <!--                            </div>-->
                        <!--                        </form>-->

                    </div>
                </div>
                <div class="col-12 md:col-8 lg:col-5">
                    <div class="row row1">
                        <div class="col-6 sm:col-4 mb-4 sm:mb-0">
                            <h4 class="text-[22px] font-semibold capitalize mb-6 text-white">{{ $t('label.support') }}</h4>
                            <nav v-if="supportPages.length > 0" class="flex flex-col gap-4">
                                <router-link v-for="supportPage in supportPages"
                                             class="w-fit text-sm font-medium capitalize text-white transition-all duration-300 hover:text-primary"
                                             :to="{ name: 'frontend.page', params: { slug: supportPage.slug } }">
                                    {{ supportPage.title }}
                                </router-link>
                            </nav>
                        </div>
                        <div class="col-6 sm:col-4 mb-4 sm:mb-0">
                            <h4 class="text-[22px] font-semibold capitalize mb-6 text-white">{{ $t('label.legal') }}</h4>
                            <nav v-if="legalPages.length > 0" class="flex flex-col gap-4">
                                <router-link v-for="legalPage in legalPages"
                                             class="w-fit text-sm font-medium capitalize text-white transition-all duration-300 hover:text-primary"
                                             :to="{ name: 'frontend.page', params: { slug: legalPage.slug } }">
                                    {{ legalPage.title }}
                                </router-link>
                            </nav>
                        </div>
                        <div class="col-12 sm:col-4">
                            <h4 class="text-[22px] font-semibold capitalize mb-6 text-white">
                                {{ $t('label.contact') }}</h4>
                            <ul class="flex flex-col gap-5">
                                <li class="flex gap-3">
                                    <i class="lab-fill-location text-sm flex-shrink-0 text-white"></i>
                                    <span class="text-sm font-medium text-white">{{ setting.company_address }}</span>
                                </li>
                                <li class="flex gap-3">
                                    <i class="lab-fill-mail text-sm flex-shrink-0 text-white"></i>
                                    <span class="text-sm font-medium text-white">{{ setting.company_email }}</span>
                                </li>
                                <li class="flex gap-3">
                                    <i class="lab-fill-calling text-sm flex-shrink-0 text-white"></i>
                                    <span class="text-sm font-medium text-white">{{ setting.company_phone }}</span>
                                </li>
                            </ul>

                            <dl class="mt-6">

                            </dl>
                        </div>
                    </div>
                </div>
                <div class="sev col-3 sm:col-3 md:col-3 lg:col-1">
                    <h4 class="text-[22px] font-semibold capitalize mb-6 text-white">
<!--                        {{ $t('label.support') }}-->
                        تطبيقات لافوي
                    </h4>
                    <dd class="flex gap-3">
                        <a target="_blank" class="router-link-active router-link-exact-active"
                           v-if="setting.site_android_app_link" :href="setting.site_android_app_link">
                            <img class="rounded-lg" :src="setting.image_play_store" alt="app"
                                 loading="lazy">
                        </a>
                        <br><br><br>
                        <a target="_blank" class="router-link-active router-link-exact-active"
                           v-if="setting.site_ios_app_link" :href="setting.site_ios_app_link">
                            <img class="rounded-lg" :src="setting.image_app_store" alt="app" loading="lazy">
                        </a>
                    </dd>
                </div>
            </div>
        </div>
        <div class="ses pt-4 pb-24 lg:py-4 flex mt-8 w-full text-center border-t border-white/5" style="text-align: left;background:#573c99;display: flex;align-items: center;justify-content: space-evenly;">
            <p class="text-xs font-medium" style="color:#ffffff;font-size:17px ">{{ setting.site_copyright }}</p>
            <img src="/payments.png" alt="logo" loading="lazy" style="width: 20rem;height: inherit">
        </div>
    </footer>
</template>


<script>
import statusEnum from "../../../enums/modules/statusEnum";
import axios from "axios";
import alertService from "../../../services/alertService";
import LoadingComponent from "../../frontend/components/LoadingComponent";
import menuSectionEnum from "../../../enums/modules/menuSectionEnum";
import _ from "lodash";

export default {
    name: "FrontendFooterComponent",
    components: { LoadingComponent },
    data() {
        return {
            loading: {
                isActive: false,
            },
            legalPages: [],
            supportPages: [],
            enums: {
                statusEnum: statusEnum,
                menuSectionEnum: menuSectionEnum
            },
            subscriptionProps: {
                post: {
                    email: ""
                }
            }
        }
    },
    computed: {
        setting: function () {
            return this.$store.getters['frontendSetting/lists'];
        },
        insertYourEmail() {
            return this.$t('label.insertyouremail');
        }
    },
    mounted() {
        this.loading.isActive = true;
        this.$store.dispatch("frontendPage/lists", {
            paginate: 0,
            order_column: "id",
            order_type: "asc",
            status: this.enums.statusEnum.ACTIVE
        }).then(res => {
            if (res.data.data.length > 0) {
                _.forEach(res.data.data, (page) => {
                    if (page.menu_section_id === this.enums.menuSectionEnum.LEGAL) {
                        this.legalPages.push(page);
                    } else {
                        this.supportPages.push(page);
                    }
                });
            }
            this.loading.isActive = false;
        }).catch((err) => {
            this.loading.isActive = false;
        });
    },
    methods: {
        saveSubscription: function () {
            const url = '/frontend/subscriber';
            this.loading.isActive = true;
            axios.post(url, this.subscriptionProps.post).then(res => {
                this.loading.isActive = false;
                this.subscriptionProps.post.email = "";
                alertService.success(this.$t("message.subscribe"));
            }).catch((err) => {
                this.loading.isActive = false;
            });
        }
    }
}
</script>
<style scoped>
    @media (max-width: 639px) {
        .fent{
            text-align: center;
        }
        .sev{
            text-align: center;
            width: 100%;

        }
        .sev h4{
            font-size: 11px!important;
        }
        .ses{
            display: grid!important;
            justify-content: center!important;
            align-items: center!important;
            justify-content: space-evenly!important;
            row-gap: 1rem!important;
            padding-bottom: 0!important;
        }
        .row1{
            display: block!important;
            direction: rtl!important;
        }
    }
</style>
