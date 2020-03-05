<template>
    <div class="newscard mx-3 my-3">
        <div class="img-description px-2 py-2">
            <div class="img-container"></div>
            <div class="description-container">
                <div class="description px-2 py-2">
                    <p>
                        Lorem ipsum dolor sit, amet consectetur adipisicing
                        elit. Similique ut veritatis labore ea minima cum
                        deserunt beatae tempore ex eum temporibus quod, non
                        repudiandae, voluptates, culpa dicta possimus inventore
                        sunt.
                    </p>
                </div>
            </div>
        </div>

        <div class="autor-date-container px-2 py-1">
            <p>Por Heber Uc Rivero</p>
            <div class="tag-container">
                <p class="px-1 tag-text">TRANSGÉNICOS</p>
            </div>
            <p><b>Publicado:</b> 0.1.12.2019</p>

            <div class="read-more">
                <p>Leer más...</p>
            </div>
        </div>
    </div>
</template>

<script>
export default {};
</script>

<style lang="scss" scoped>
@media only screen and (min-width: 1024px) and (max-height: 1366px) and (-webkit-min-device-pixel-ratio: 1.5) {
    .autor-date-container {
    }
    .newscard {
        height: 20em;
    }
}

@media only screen and (min-width: 768px) and (max-width: 1024px) {
    .autor-date-container {
    }
    .newscard {
        height: 20em !important;
    }
    .newscard > .autor-date-container > p {
        font-size: 0.5em !important;
    }
}

.newscard {
    height: 15em;
    // width: 23em;
    // width: 100%;
    // background-color: aliceblue;
    display: grid;
    grid-template-columns: 100%;
    grid-template-rows: 75% 25%;
    border: 2px solid rgba(0, 0, 0, 0.245);
    border-radius: 5px;
    // background-color: black;

    .img-description {
        border-radius: 5px;
        display: grid;
        grid-template-columns: 55% 1fr;
        grid-template-rows: 100%;
        height: 100%;
        width: 100%;
        // background-color: violet;

        .img-container {
            height: 95%;
            width: 95%;
            background-image: url("https://source.unsplash.com/user/wsanter");
        }

        .description-container {
            border-radius: 5px;
            height: 95%;
            width: 98%;
            // background-color: rgba(209, 209, 209, 0.774);
            overflow: scroll;
            overflow-x: hidden;
        }
    }
    .autor-date-container {
        border-bottom-right-radius: 5px;
        border-bottom-left-radius: 5px;
        display: grid;
        grid-template-columns: repeat(2, 50%);
        grid-template-rows: repeat(2, 50%);
        height: 100%;
        width: 100%;
        background-color: white;

        .tag-container {
            height: fit-content;
            width: fit-content;
            background-color: #15151583;
            border: 1px solid rgba(0, 0, 0, 0.794);

            p {
                color: white;
                font-size: 0.65em;
                padding-top: 0.2em;
                padding-bottom: 0.2em;
                margin: 0 0 0 0;
            }
        }

        p,
        b {
            font-weight: bold;
            // font-style: italic;
            font-size: 0.8em;
        }
    }
}

.newscard:hover {
    -webkit-box-shadow: 2px 3px 10px -1px rgba(0, 0, 0, 0.75);
    -moz-box-shadow: 2px 3px 10px -1px rgba(0, 0, 0, 0.75);
    box-shadow: 2px 3px 10px -1px rgba(0, 0, 0, 0.75);
}

.tag-text {
    font-style: normal;
}

::-webkit-scrollbar {
    width: 10px;
}

::-webkit-scrollbar-track {
    background: #f1f1f1;
}

::-webkit-scrollbar-thumb {
    background: #888;
}

::-webkit-scrollbar-thumb:hover {
    background: #555;
}
</style>
