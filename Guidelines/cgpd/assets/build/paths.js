const path = require( 'path' );
const fs = require( 'fs' );

const themeDir = fs.realpathSync( process.cwd() );
const resolveTheme = ( relativePath ) => path.resolve( themeDir, relativePath );

module.exports = {
	dist: resolveTheme( 'dist' ),
	assets: resolveTheme( 'assets' ),
	script: resolveTheme( 'assets/js/index.js' ),
};
