<template>


    <div>
        <Header />
        <!-- <section class="ptb-0">
            <div class="mb-30 brdr-ash-1 opacty-5"></div>
            <div class="container">
                <a class="mt-10" href="index.html"
                    ><i class="mr-5 ion-ios-home"></i>Home<i
                        class="mlr-10 ion-chevron-right"
                    ></i
                ></a>
                <a class="color-ash mt-10" href="06_contact-us.html"
                    >Contact us</a
                >
            </div>
        </section> -->

        <section>
            <div class="container">
                <div class="row">
                    <div
                        v-show="(muestramensaje = false)"
                        class="col-sm-12 col-md-8"
                    >
                        <h3><b>ENVÍANOS UN MENSAJE.</b></h3>
                        <p class="mb-30 mr-100 mr-sm-0">
                            Nos gustaría mucho saber sobre ti, ponte en contacto
                            con nosotros.
                        </p>
                        <form
                            class="form-block form-bold form-mb-20 form-h-35 form-brdr-b-grey pr-50 pr-sm-0"
                        >
                            <div class="row">
                                <div class="col-sm-6">
                                    <p class="color-ash">Nombre <b>*</b></p>
                                    <div class="pos-relative">
                                        <input class="pr-20" type="text" />
                                        <i
                                            class="abs-tbr lh-35 font-13 color-green"
                                        ></i>
                                    </div>
                                    <!-- pos-relative -->
                                </div>
                                <!-- col-sm-6 -->

                                <div class="col-sm-6">
                                    <p class="color-ash">Email*</p>
                                    <div class="pos-relative">
                                        <input class="pr-20" type="email" />
                                        <i
                                            class="dplay-none abs-tbr lh-35 font-13 color-green ion-android-done"
                                        ></i>
                                    </div>
                                    <!-- pos-relative -->
                                </div>
                                <!-- col-sm-6 -->

                                <div class="col-sm-6">
                                    <p class="color-ash">
                                        Número telefónico <b>*</b>
                                    </p>
                                    <div class="pos-relative">
                                        <input class="pr-20" type="text" />
                                        <i
                                            class="dplay-none abs-tbr lh-35 font-13 color-green ion-android-done"
                                        ></i>
                                    </div>
                                    <!-- pos-relative -->
                                </div>
                                <!-- col-sm-6 -->

                                <div class="col-sm-6">
                                    <p class="color-ash">compañia <b>*</b></p>
                                    <div class="pos-relative">
                                        <input class="pr-20" type="text" />
                                        <i
                                            class="dplay-none abs-tbr lh-35 font-13 color-green ion-android-done"
                                        ></i>
                                    </div>
                                    <!-- pos-relative -->
                                </div>
                                <!-- col-sm-6 -->

                                <div class="col-sm-12">
                                    <div class="pos-relative pr-80">
                                        <p class="color-ash">
                                            Mensaje <b>*</b>
                                        </p>
                                        <h4>
                                            <b>Escríbenos tus comentarios.</b>
                                        </h4>
                                        <textarea class="mb-0"></textarea>
                                        <button
                                            class="abs-br font-20 plr-15 btn-fill-primary"
                                            type="submit"
                                        >
                                            <i class="ion-ios-paperplane"></i>
                                        </button>
                                    </div>
                                    <!-- pos-relative -->
                                </div>
                                <!-- col-sm-6 -->
                            </div>
                            <!-- row -->
                        </form>
                    </div>
                    <!-- col-md-6 -->

                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <h3 class="mb-20 mt-sm-50"><b>Sobre nosotros</b></h3>

                        <p>Crisis climática y autonomía es un sitio web construido por el Centro de Estudios para el
                        Cambio en el Campo Mexicano (Ceccam), con el fin de enfocar los problemas que provoca
                        la crisis climática y las soluciones que proponen los pueblos indígenas y las sociedades
                        campesinas. En sentido opuesto los proyectos energéticos y extractivos, causantes de la
                        crisis climática atentan contra la autonomía de los pueblos indígenas y campesinos, invaden
                        sus territorios y amenazan sus formas de vida.
                        La información contenida se refiere principalmente a México y da cuenta de las luchas de
                        los pueblos indígenas y campesinos por mantener la autonomía en sus territorios, a pesar de
                        la invasión de empresas mineras, de generación eléctrica, de explotación de hidrocarburos,
                        o la instalaciuón de megaproyectos, con el apoyo del Estado.</p>

                        <ul style="margin-top:2%"
                            class="font-11 list-relative list-li-pl-30 list-block list-li-mb-15">
                            <li>
                                <i class="abs-tl ion-ios-location"></i>599 Co Rd
                                771 Coyoacán<br />81237. Ciudad de México
                            </li>
                            <li>
                                <i class="abs-tl ion-android-mail"></i
                                >crisisclimatica.yautonomia@gmail.com
                            </li>
                            <li>
                                <i class="abs-tl ion-android-call"></i>(55) 5661
                                19 25 <br />
                                (55) 5661 53 98
                            </li>
                        </ul>
                    
                    </div>
                    <!-- col-md-6 -->
                </div>
                <!-- row -->
            </div>
            <!-- container -->
        </section>
        <Footer class="my-0" />
    </div>
</template>

<script>
import Footer from "./footer";
import Header from "./header";
import Vue from 'vue'

export default {
    name: "about",

    components: {
        Footer,
        Header
    }
};
</script>

<style></style>
