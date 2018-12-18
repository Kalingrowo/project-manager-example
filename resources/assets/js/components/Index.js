import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter, Route, Switch } from 'react-router-dom';
import Header from './HeaderX';
import Footer from './FooterX';
import ProjectsList from './ProjectsList';

export default class Index extends Component {
    render() {
        return (
          <BrowserRouter>
            <div class="content">
                <Header />
                <Switch>
                  <Route exact path='/' component={ProjectsList} />
                </Switch>
                <Footer />
            </div>
          </BrowserRouter>
        );
    }
}

if (document.getElementById('js_app')) {
    ReactDOM.render(<Index />, document.getElementById('js_app'));
}
