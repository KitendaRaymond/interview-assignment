import axios from 'axios'
    import React, { Component } from 'react'

    class AddSacco extends Component {
      constructor (props) {
        super(props)
        this.state = {
          sacconame: '',
          country: '',
          errors: []
        }
        this.handleFieldChange = this.handleFieldChange.bind(this)
        this.handleCreateNewSacco = this.handleCreateNewSacco.bind(this)
        this.hasErrorFor = this.hasErrorFor.bind(this)
        this.renderErrorFor = this.renderErrorFor.bind(this)
      }

      handleFieldChange (event) {
        this.setState({
          [event.target.name]: event.target.value
        })
      }

      //Event called to save the data to the API when button is clicked
      handleCreateNewSacco (event) {
        event.preventDefault()

        const { history } = this.props

        //Create sacco object to send to API
        const sacco = {
          sacconame: this.state.sacconame,
          country: this.state.country
        }

        axios.post('/api/saccos', sacco)
          .then(response => {
            // redirect to the view saccos page
            history.push('/viewSaccos')
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
        return (
          <div className='container py-4'>
            <div className='row justify-content-center'>
              <div className='col-md-6'>
                <div className='card'>
                  <div className='card-header'>Create New Sacco</div>
                  <div className='card-body'>
                    <form onSubmit={this.handleCreateNewSacco}>
                      <div className='form-group'>
                        <label htmlFor='sacconame'>Sacco Name</label>
                        <input
                          id='sacconame'
                          type='text'
                          className={`form-control ${this.hasErrorFor('sacconame') ? 'is-invalid' : ''}`}
                          name='sacconame'
                          value={this.state.sacconame}
                          onChange={this.handleFieldChange}
                        />
                        {this.renderErrorFor('sacconame')}
                      </div>
                      <div className='form-group'>
                        <label htmlFor='country'>Country of Operation</label>
                        <input
                          id='country'
                          type='text'
                          className={`form-control ${this.hasErrorFor('country') ? 'is-invalid' : ''}`}
                          name='country'
                          value={this.state.country}
                          onChange={this.handleFieldChange}
                        />
                        {this.renderErrorFor('country')}
                      </div>
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

    export default AddSacco