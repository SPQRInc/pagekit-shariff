module.exports = [
	{
		entry: {
			"shariff-settings": "./app/components/shariff-settings.vue",
			"shariff-widget": "./app/components/shariff-widget.vue"
		},
		output: {
			filename: "./app/bundle/[name].js"
		},
		module: {
			loaders: [
				{test: /\.vue$/, loader: "vue"},
				{test: /\.js$/, exclude: /node_modules/, loader: "babel-loader"}
			]
		}
	}
];