/**
 * Webpack 4 config
 * @type {webpack}
 */
const webpack = require('webpack');
const path = require('path');
const VueLoader = require('vue-loader');
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
//const HtmlWebpackPlugin = require('html-webpack-plugin');
//minimize js file
const UglifyJsPlugin = require('uglifyjs-webpack-plugin')

module.exports = {
    mode: "development",
    entry: {
        "app": "./resources/assets/js/app.js"
    },
    output: {
        filename: "[name].js",
        path: path.resolve(__dirname, 'public/js'),
    },
    module: {
        rules: [
            {
                test: /\.vue$/,
                loader: 'vue-loader',
            },
            {
                test: /\.(js|jsx)$/,
                exclude: /(node_modules|bower_components)/,
                use: [
                    {
                        loader: 'babel-loader',
                        options: {
                            presets: [['es2015', {modules: false}]],
                            //   plugins: ['transform-class-properties'],
                            plugins: ["transform-object-rest-spread"]
                        }
                    }
                ]
            },
            {
                test: /\.(css|scss)$/,
                use: [
                    {
                        loader: MiniCssExtractPlugin.loader,
                    },
                    "css-loader",
                    "sass-loader"
                ]
            },
        ]
    },
    plugins: [
        new VueLoader.VueLoaderPlugin(),
        new MiniCssExtractPlugin({
            filename: "../css/[name].css",
            chunkFilename: "[id].css"
        })
        // new HtmlWebpackPlugin({
        //   template: __dirname + './index.html',
        //   filename: 'index.html',
        //   inject: 'body'
        // })
        // new UglifyJsPlugin(),
    ]
}
