/* eslint-disable no-unused-vars */
/**
 * Paths
 *
 * Project related paths.
 */

const path = require( 'path' );
const fs = require( 'fs' );

// Make sure any symlinks in the project folder are resolved:
const pluginDir = fs.realpathSync( process.cwd() );
const resolvePlugin = ( relativePath ) => path.resolve( pluginDir, relativePath );

module.exports = {
	// alias: resolvePlugin( 'assets/alias' )
};
