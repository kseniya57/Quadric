<template>
    <!--<canvas ref="canvas"></canvas>-->
    <a-scene>
        <a-entity id="rain" particle-system="preset: rain; color: #24CAFF; particleCount: 5000"></a-entity>

        <a-entity id="sphere" geometry="primitive: sphere"
                  material="color: #EFEFEF; shader: flat"
                  position="0 0.15 -5"
                  light="type: point; intensity: 5"
                  animation="property: position; easing: easeInOutQuad; dir: alternate; dur: 1000; to: 0 -0.10 -5; loop: true"></a-entity>

        <a-entity id="ocean" ocean="density: 20; width: 50; depth: 50; speed: 4"
                  material="color: #9CE3F9; opacity: 0.75; metalness: 0; roughness: 1"
                  rotation="-90 0 0"></a-entity>

        <a-entity id="sky" geometry="primitive: sphere; radius: 5000"
                  material="shader: gradient; topColor: 235 235 245; bottomColor: 185 185 210"
                  scale="-1 1 1"></a-entity>

        <a-entity id="light" light="type: ambient; color: #888"></a-entity>
    </a-scene>
</template>

<script>
    export default {
        /*data() {
            return {
               c: null,
               g: null
            }
        },
        mounted() {
            const c = this.$refs.canvas
            this.c = c
            this.g = c.getContext("webgl")
        }*/
    }
</script>