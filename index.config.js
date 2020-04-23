const path                    = require('path');
const HtmlWebpackPlugin       = require('html-webpack-plugin');
const MiniCssExtractPlugin    = require('mini-css-extract-plugin');
const OptimizeCSSAssetsPlugin = require('optimize-css-assets-webpack-plugin');
const TerserJSPlugin          = require('terser-webpack-plugin');

const config = require('./config/system.webpack.js');


var entryJS = './src/javascript/main.js';
var namePage = 'top-page';
var teamplateHTML = './page/'+namePage+'.html';

module.exports = {

    entry: entryJS,///////////////////////<-------////////////

    optimization: {
        minimizer: [
            new TerserJSPlugin({}), 
            new OptimizeCSSAssetsPlugin({})
        ],
        splitChunks: {
            chunks: 'all'
        }
    },

    plugins: [
        new HtmlWebpackPlugin({
            title   : 'title',
            filename: config.path.html + namePage +'.html',
            template: teamplateHTML,///////////////////////<-------////////////
            minify  : true
        }),
        new MiniCssExtractPlugin({
            filename: config.path.css + namePage +'.min.css',
        })
    ],
    output: {
        filename  : config.path.js + namePage +'.bundle.js',
        path      : path.join(__dirname, "/dist"),
        publicPath: config.publicPath,
    },
    module: {
        rules: [
            { 
                test: /\.(png|woff|woff2|eot|otf|ttf|svg)$/, 
                loader: 'url-loader', 
                options: {
                    limit: 100000
                }
            },
            {
                test: /\.(css|scss)$/,
                loader : [ MiniCssExtractPlugin.loader, 'css-loader?url=false', 'sass-loader' ]
            },
            {
                test   : /\.(png|jpg|jpeg|gif|ico|svg)$/,
                loader : 'file-loader',
                options: {
                    name      : '[name].[ext]',
                    outputPath: config.path.file
                }
            }
        ]
    },
    devServer: {
      port: 8008
    },
    devtool: 'inline-source-map'
};