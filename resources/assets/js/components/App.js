import React, { Component } from 'react'
import ReactDOM from 'react-dom'
import { BrowserRouter, Route, Switch } from 'react-router-dom'
import AddSacco from './AddSacco'
import SingleSacco from './SingleSacco'
import SaccosList from './SaccosList'
import Header from './Header'
import TransactionsList from './TransactionsList'
import AddIndividual from './AddIndividual'

    class App extends Component {
      render () {
        return (

          <BrowserRouter>
            <div>
              <Header />
              <Switch>
                <Route exact path='/' component={TransactionsList} />
                <Route path='/create' component={AddSacco} />
                <Route path='/createIndividual' component={AddIndividual} />
                <Route path='/viewSaccos' component={SaccosList} />
                <Route path='/:id' component={SingleSacco} />
              </Switch>
            </div>
          </BrowserRouter>
        )
      }
    }

    ReactDOM.render(<App />, document.getElementById('app'))