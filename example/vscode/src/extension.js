
const net = require('net');
const vscode = require('vscode');
const jrpc = require('vscode-jsonrpc');
const lsp = require('vscode-languageclient/node');

let client = null;

function activate(context) {
    const config = vscode.workspace.getConfiguration("php-lsp");

    const serverOptions = () => {
        // Connect to language server via socket
        let socket = net.connect({
            host: config.get('host'),
            port: config.get('port'),
        });

        return Promise.resolve({
            writer: socket,
            reader: socket
        });
    };

    const clientOptions = {
        documentSelector: ['*'],
        synchronize: {
            fileEvents: vscode.workspace.createFileSystemWatcher('**/*.*')
        }
    };

    client = new lsp.LanguageClient(
        'php-lsp',
        'php-lsp',
        serverOptions,
        clientOptions
    );

    client.setTrace(jrpc.Trace.Verbose);
    client.start();
}


function deactivate() {
    if (client !== null) {
        client.stop();
        client = null;
    }
}

module.exports = {activate, deactivate};
