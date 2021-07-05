import axios from 'axios'
    import React, { Component } from 'react'
    import { Link } from 'react-router-dom'

    class SingleSacco extends Component {
      constructor (props) {
        super(props)
        this.state = {
          sacco: {},
          individuals: []
        }
      }

      componentDidMount () {
        const saccoId = this.props.match.params.id

        axios.get(`/api/saccos/${saccoId}`).then(response => {
          this.setState({
            sacco: response.data,
            individuals: response.data.individuals
          })
        })
      }

      render () {
        const { sacco, individuals } = this.state

        return (
          <div className='container py-4'>
            <div className='row justify-content-center'>
              <div className='col-md-8'>
                <div className='card'>
                  <div className='card-header'>{sacco.name}</div>
                  <div className='card-body'>
                    <p>{sacco.country}</p>

                    <button className='btn btn-primary btn-sm'>
                      Mark as Active
                    </button>&nbsp;&nbsp;&nbsp;&nbsp;

                    <Link className='btn btn-primary btn-sm mb-3' to='/viewSaccos'>
                         View Saccos
                    </Link>

                    <hr />

                    <p>Individuals in Sacco</p>

                    <table className="table table-striped table-hover table-responsive">
                        <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Gender</th>
                        </tr>
                        </thead>
                        <tbody>
                            {
                                individuals.map((individual) => (
                                    <tr key={individual.id}>
                                        <td>{individual.first_name}</td>
                                        <td>{individual.last_name}</td>
                                        <td>{individual.email}</td>
                                        <td>{individual.gender}</td>
                                        
                                    </tr>
                                ))
                            }
                        </tbody>
                    </table>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        )
      }
    }

    export default SingleSacco