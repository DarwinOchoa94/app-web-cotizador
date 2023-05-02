<?php
	class claseSlider {
        public static function show() {
            $mostrar = "
                <div id='wowslider-container1'>
                    <div class='ws_images'>
                        <ul>
                            <li>
                                <img 
                                    src='../TorresyTorres/files/slider/data1/images/sliderservicios1.jpg' 
                                    alt='Importación y Exportación' 
                                    title='Importación y Exportación' 
                                    id='wows1_0'
                                >
                                </img>
                                Requerimientos para cotizar un nuevo servicio, cambio de tarifas, etc.
                            </li>
                            <li>
                                <img 
                                    src='../TorresyTorres/files/slider/data1/images/sliderservicios2.jpg' 
                                    alt='content slider' 
                                    title='Transporte' 
                                    id='wows1_1'
                                </img>
                            </li>
                            <li>
                                <img 
                                    src='../TorresyTorres/files/slider/data1/images/sliderservicios3.jpg' 
                                    alt='Estiba' 
                                    title='Estiba' 
                                    id='wows1_2'
                                </img>
                            </li>
                        </ul>
                    </div>
                    <div class='ws_bullets'>
                        <div>
                            <a 
                                href='#' 
                                title='Importación y Exportación'
                            >
                                <span>
                                    <img 
                                        src='../TorresyTorres/files/slider/data1/tooltips/sliderservicios1.jpg' 
                                        alt='Importación y Exportación'
                                    </img>
                                        1
                                </span>
                            </a>
                            <a 
                                href='#' 
                                title='Transporte'
                            >
                                <span>
                                    <img 
                                        src='../TorresyTorres/files/slider/data1/tooltips/sliderservicios2.jpg' 
                                        alt='Transporte'
                                    </img>
                                        2
                                </span>
                            </a>
                            <a 
                                href='#' 
                                title='Estiba'
                            >
                                <span>
                                    <img 
                                        src='../TorresyTorres/files/slider/data1/tooltips/sliderservicios3.jpg' 
                                        alt='Estiba'
                                    </img>
                                        3
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class='ws_shadow'>
                    </div>
                </div>	
                <script type='text/javascript' src='../TorresyTorres/files/slider/engine1/wowslider.js'>
                </script>
                <script type='text/javascript' src='../TorresyTorres/files/slider/engine1/script.js'>
                </script>
            ";

            return $mostrar;
        }
    }
?>