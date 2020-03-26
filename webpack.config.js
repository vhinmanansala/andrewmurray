// External dependencies.
const MiniCssExtractPlugin = require( 'mini-css-extract-plugin' );
const WebpackNotifierPlugin = require( 'webpack-notifier' );
const UglifyJsPlugin = require( 'uglifyjs-webpack-plugin' );

// Asset paths.
const themeAssetsPath = './web/wp-content/themes/andrewmurray/assets';

module.exports = ( env ) => {
	// Build configuration.
	const config = [ {
		// Theme config.
		entry: {
			theme: `${ themeAssetsPath }/src/theme/theme.js`,
			editor: `${ themeAssetsPath }/src/editor/editor.js`,
		},
		module: {
			rules: [
				{
					test: /\.(js)$/,
					exclude: /node_modules/,
					loader: 'babel-loader',
					options: {
						babelrc: false,
						presets: [
							[
								'@babel/preset-env',
								{
									modules: false,
									targets: { browsers: [ 'extends @wordpress/browserslist-config' ] },
								},
							],
						],
						plugins: [
							'@babel/plugin-transform-react-jsx',
							'@babel/plugin-proposal-object-rest-spread',
						],
					},
				},
				{
					test: /\.(sa|sc|c)ss$/,
					use: [
						MiniCssExtractPlugin.loader,
						{
							loader: 'css-loader',
							options: {
								url: false,
							},
						},
						{
							loader: 'postcss-loader',
							options: {
								plugins: () => [
									require( 'autoprefixer' )( {
										grid: true,
									} ),
									require( 'postcss-css-variables' ),
									require( 'postcss-calc' ),
								],
							},
						},
						{
							loader: 'sass-loader',
							query: {
								outputStyle: 'compressed',
							},
						},
					],
				},
			],
		},
		resolve: {
			extensions: [ '*', '.js' ],
		},
		output: {
			path: __dirname,
			filename: `${ themeAssetsPath }/dist/[name].js`,
			publicPath: '/',
			libraryTarget: 'this',
		},
		optimization: {
			minimize: true,
			minimizer: [
				new UglifyJsPlugin( {
					uglifyOptions: {
						output: {
							comments: false,
							beautify: false,
						},
					},
				} ),
			],
		},
		plugins: [
			new MiniCssExtractPlugin( {
				filename: `${ themeAssetsPath }/dist/[name].css`,
			} ),
		],
		externals: {
			wp: 'wp',
			jquery: 'jQuery',
			'react': 'React',
    		'react-dom': 'ReactDOM',
		},
		performance: {
			hints: false,
		},
	} ];

	// Notification for dev.
	if ( 'development' === env ) {
		config.map( ( conf ) => {
			conf.plugins.push( new WebpackNotifierPlugin( {
				title: 'Build',
				alwaysNotify: true,
			} ) );
		} );
	}

	return config;
};
