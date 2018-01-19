const CopyWebpackPlugin = require ('copy-webpack-plugin');
const path = require ('path');

module.exports = [
	{
		entry: {
			"shariff-settings": "./app/components/shariff-settings.vue",
			"shariff-widget": "./app/components/shariff-widget.vue"
		},
		output: {
			filename: "./app/bundle/[name].js"
		},
		plugins: [
			new CopyWebpackPlugin ([
				{
					from: './node_modules/shariff/dist',
					to: './app/assets/shariff'
				}
			], {
				ignore: [
					'*.txt'
				],
				copyUnmodified: true
			})
		],
		module: {
			loaders: [
				{test: /\.vue$/, loader: "vue"},
				{test: /\.js$/, exclude: /node_modules/, loader: "babel-loader"}
			]
		}
	}
];