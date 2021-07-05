import axios from 'axios'
import React, { Component } from 'react'
import { Link } from 'react-router-dom'

    class AddIndividual extends Component {
      constructor (props) {
        super(props)
        this.state = {
          firstname: '',
          lastname: '',
          email: '',
          gender: '',
          sacco_id: '',
          errors: [],
          saccos: []
        }
        
        this.handleFieldChange = this.handleFieldChange.bind(this)
        this.handleCreateNewIndividual = this.handleCreateNewIndividual.bind(this)
        this.hasErrorFor = this.hasErrorFor.bind(this)
        this.renderErrorFor = this.renderErrorFor.bind(this)
      }

      componentDidMount () {
        axios.get('/api/saccos').then(response => {
          this.setState({
            saccos: response.data
          })
        })
      }

      handleFieldChange (event) {
        this.setState({
          [event.target.name]: event.target.value
        })
      }

      //Event called to save the data to the API when button is clicked
      handleCreateNewIndividual (event) {
        event.preventDefault()

        const { history } = this.props

        //Create individual object to send to API
        const individual = {
          firstname: this.state.firstname,
          lastname: this.state.lastname,
          email: this.state.email,
          gender: this.state.gender,
          sacco_id: this.state.sacco_id
        }

        axios.post('/api/individuals', individual)
          .then(response => {
            // redirect to the view individuals page
            history.push('/viewIndividuals')
          })
          .catch(error => {
            this.setState({
              errors: error.response.data.errors
            })
          })
      }

      hasErrorFor (field) {
        return !!this.state.errors[field]
      }

      renderErrorFor (field) {
        if (this.hasErrorFor(field)) {
          return (
            <span className='invalid-feedback'>
              <strong>{this.state.errors[field][0]}</strong>
            </span>
          )
        }
      }

      render () {

        let saccos = this.state.saccos;
        let optionItems = saccos.map((sacco) =>
                <option key={sacco.id}>{sacco.name}</option>
            );

        return (
          <div className='container py-4'>
            <div className='row justify-content-center'>
              <div className='col-md-6'>
                <div className='card'>
                  <div className='card-header'>Create New Individual &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <Link className='btn btn-primary btn-sm mb-3' to='/viewIndividuals'>
                  View Individuals
                </Link>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <Link className='btn btn-primary btn-sm mb-3' to='/viewSaccos'>
                  View Saccos
                </Link>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <Link className='btn btn-primary btn-sm mb-3' to='/'>
                  Transactions
                </Link>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  </div>
                  <div className='card-body'>
                    <form onSubmit={this.handleCreateNewIndividual}>
                      <div className='form-group'>
                        <label htmlFor='firstname'>First Name</label>
                        <input
                          id='firstname'
                          type='text'
                          className={`form-control ${this.hasErrorFor('firstname') ? 'is-invalid' : ''}`}
                          name='firstname'
                          value={this.state.firstname}
                          onChange={this.handleFieldChange}
                        />
                        {this.renderErrorFor('firstname')}
                      </div>
                      <div className='form-group'>
                        <label htmlFor='lastname'>Last Name</label>
                        <input
                          id='lastname'
                          type='text'
                          className={`form-control ${this.hasErrorFor('lastname') ? 'is-invalid' : ''}`}
                          name='lastname'
                          value={this.state.lastname}
                          onChange={this.handleFieldChange}
                        />
                        {this.renderErrorFor('email')}
                      </div>
                      <div className='form-group'>
                        <label htmlFor='email'>Email Address</label>
                        <input
                          id='email'
                          type='text'
                          className={`form-control ${this.hasErrorFor('email') ? 'is-invalid' : ''}`}
                          name='email'
                          value={this.state.email}
                          onChange={this.handleFieldChange}
                        />
                        {this.renderErrorFor('email')}
                      </div>
                      <div className='form-group'>
                        <label htmlFor='gender'>Gender</label>
                        <input
                          id='gender'
                          type='text'
                          className={`form-control ${this.hasErrorFor('gender') ? 'is-invalid' : ''}`}
                          name='gender'
                          value={this.state.gender}
                          onChange={this.handleFieldChange}
                        />
                        {this.renderErrorFor('gender')}
                      </div>
                      <div>
                      <label htmlFor='sacco_id'>Sacco</label>
                        <select
                          id='sacco_id'
                          type='text'
                          className={`form-control ${this.hasErrorFor('sacco_id') ? 'is-invalid' : ''}`}
                          name='sacco_id'
                          onChange={this.handleFieldChange}
                        >
                        {optionItems}
                        </select>
                        {this.renderErrorFor('sacco_id')}
                      </div>
                      <br/>
                      <br/>
                      <button className='btn btn-primary'>Create</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        )
      }
    }

    export default AddIndividual