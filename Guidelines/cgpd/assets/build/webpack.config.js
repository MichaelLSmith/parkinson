const path = require( 'path' );
const webpack = require( 'webpack' );
const WebpackNotifierPlugin = require( 'webpack-notifier' );
const TerserPlugin = require( 'terser-webpack-plugin' );
const OptimizeCSSAssetsPlugin = require( 'optimize-css-assets-webpack-plugin' );

const alias = require( './alias' );
const paths = require( './paths' );

module.exports = ( env, options ) => {
	const devMode = options.mode !== 'production';

	return {
		entry: {
			script: paths.script,
		},
		output: {
			filename: '[name].js',
			chunkFilename: '[name].bundle.js',
			path: paths.dist,
		},
		optimization: {
			minimizer: [
				new TerserPlugin( {
					sourceMap: devMode,
				} ),
				new OptimizeCSSAssetsPlugin( {} ),
			],
		},
		resolve: {
			modules: [ path.resolve( __dirname, 'src/js' ), 'node_modules' ],
			extensions: [ '.js', '.jsx', '.json' ],
			alias,
		},
		watch: devMode,
		devtool: devMode ? 'inline-source-map' : 'none',
		performance: { hints: false },
		module: {
			rules: [
				{
					test: /.(js|jsx)$/,
					include: paths.assets,
					use: {
						loader: 'babel-loader',
					},
				},
				{
					test: /\.(css|scss)$/,
					use: [
						{
							loader: 'file-loader',
							options: {
								name: 'style.css',
								context: '../',
								publicPath: '../',
								outputPath: '../',
							},
						},
						{ loader: 'extract-loader' },
						{
							loader: 'css-loader',
							options: {
								url: false,
							},
						},
						{
							loader: 'postcss-loader',
							options: {
								config: {
									path: 'assets/build/postcss.config.js',
								},
							},
						},
						'sass-loader',
					],
				},
			],
		},
		plugins: [
			new webpack.ProvidePlugin( {
				Popper: [ 'popper.js', 'default' ],
				$: 'jQuery',
			} ),
			new WebpackNotifierPlugin( {
				alwaysNotify: true,
			} ),
		],
		externals: {
			jquery: 'jQuery',
		},
	};
};
