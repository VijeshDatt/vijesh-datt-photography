<template>
	<div>
		<v-container fluid>
			<v-card flat color="transparent">
				<!-- <masonry :cols="{default: 4, 960: 1, 1264: 2}">
					<v-container v-for="(file, index) in images" :key="index">
						<v-hover v-slot="{ hover }">
							<v-img contain :lazy-src="`/assets/images/home/${file.filename}`" :src="`/assets/images/home/${file.filename}`" class="my-0 text-center rounded-xl elevation-16" @load="loaded(file.filename)">
								<transition name="scale-transition">
									<div v-if="hover && hasLoaded && $vuetify.breakpoint.mdAndUp" class="d-flex transition-fast-in-fast-out grey darken-2 v-card--reveal" style="height: 100%; cursor: pointer;" @click="openImage(file.filename)">
										<v-icon size="32" dark>fa-up-right-and-down-left-from-center</v-icon>
									</div>
								</transition>
							</v-img>
						</v-hover>
					</v-container>
				</masonry> -->

				<vue-masonry-wall :items="images" :options="options" :key="key">
					<template v-slot:default="{item}">
						<div class="item elevation-16">
							<!-- <v-container> -->
							<v-hover v-slot="{ hover }">
								<v-card elevation="16" class="rounded-xl">
									<img :src="`/assets/images/home/${item.filename}`" class="rounded-xl" :alt="item.filename" @load="loaded(item.filename)">
									<transition name="scale-transition">
										<v-overlay absolute v-if="hover" @click="openImage(item.filename)">
											<v-icon size="32" dark>fa-up-right-and-down-left-from-center</v-icon>
										</v-overlay>
									</transition>
								</v-card>
								<!-- <v-img contain max-width="100px" :lazy-src="`/assets/images/home/${item.filename}`" :src="`/assets/images/home/${item.filename}`" class="my-0 text-center rounded-xl elevation-16" @load="loaded(item.filename)">
									<transition name="scale-transition">
										<div v-if="hover && hasLoaded && $vuetify.breakpoint.mdAndUp" class="d-flex transition-fast-in-fast-out grey darken-2 v-card--reveal" style="height: 100%; cursor: pointer;" @click="openImage(item.filename)">
											<v-icon size="32" dark>fa-up-right-and-down-left-from-center</v-icon>
										</div>
									</transition>
								</v-img> -->
							</v-hover>
							<!-- </v-container> -->
						</div>
					</template>
				</vue-masonry-wall>
			</v-card>
		</v-container>

		<!-- Dialog for zoom -->
		<v-dialog v-model="dialog" overlay-opacity="0.8">
			<v-img :src="image" contain max-height="90vh" @click="close"></v-img>
		</v-dialog>
	</div>
</template>

<script>
import axios from 'axios';
export default {
	data() {
		return {
			images: [],
			loadedImages: [],
			dialog: false,
			image: null,
			hasLoaded: false,
			options: {
				width: 400,
				padding: {
					2: 8,
					default: 12
				},
			},
			key: 0,
		};
	},

	computed: {
		mainSize() {
			return this.$vuetify.breakpoint.mdAndUp ? 'font-size: 5rem;' : 'font-size: 3rem;';
		},
	},

	methods: {
		close() {
			this.dialog = false;
			// this.image = null;
		},

		getHomeImages() {
			// const images = require.context('/assets/images/home/', false, /^\.\/.*$/);
			// const shuffled = images.keys().sort(() => Math.random() - 0.5);
			// shuffled.forEach(name => {
			// 	this.images.push(`/assets/images/home/${name.substring(2)}`);
			// });

			axios
				.get('/api/home')
				.then(res => this.images = res.data.data)
				.catch(e => console.log(e));
		},

		openImage(image) {
			this.image = `/assets/images/home/${image}`;
			this.dialog = true;
		},

		loaded(image) {
			this.loadedImages.push(image);
			if (this.loadedImages.length == this.images.length) {
				setTimeout(() => this.hasLoaded = true, 1000);
				this.key++;
			}
		}
	},

	mounted() { },

	created() {
		this.getHomeImages();
	},
}
</script>

<style>
.v-card--reveal {
	align-items: center;
	top: 0;
	justify-content: center;
	opacity: 0.75;
	position: absolute;
	width: 100%;
	border-radius: 24px;
}

.v-dialog {
	box-shadow: none !important;
}

.item {
	overflow: hidden;
	width: 100%;
	border-radius: 24px !important;
}

img {
	object-fit: cover;
	width: 100%;
	height: 100%;
	line-height: 0;
	display: block;
}
</style>

<!-- Style for svg - f8f8f8 -->
