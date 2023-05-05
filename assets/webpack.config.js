const path = require('path');
const MiniCssExtractPlugin = require("mini-css-extract-plugin");

module.exports = {
    
    entry : {
        main : './src/js/main.js',
        single : './src/js/single.js',
        editor : './src/js/editor.js',
     
    },
    output : {
       
        path : path.resolve(__dirname, 'build'),
        filename : 'js/[name].js',
        
    },
    plugins: [new MiniCssExtractPlugin(
        {
            filename: 'css/[name].css'
        }
    )],
    module : {
        rules : [
            {
                test: /\.js$/,
                include: [ path.resolve(__dirname, 'src/js') ],
                exclude: /node_modules/,
                use: 'babel-loader'
            },
            {
                test: /\.scss$/i,
                use: [MiniCssExtractPlugin.loader, "css-loader", "sass-loader"],
              },
        ]
    },
    mode : 'production',
    externals: {
		jquery: 'jQuery'
	}
}

