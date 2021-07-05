import axios from 'axios'
import React, { Component } from 'react'
import { Link } from 'react-router-dom'

class SaccosList extends Component {
  constructor () {
    super()
    this.state = {
      saccos: []
    }
  }

  componentDidMount () {
    axios.get('/api/saccos').then(response => {
      this.setState({
        saccos: response.data
      })
    })
  }

  render () {
    const { saccos } = this.state
    return (
      <div className='container py-4'>
        <div className='row justify-content-center'>
          <div className='col-md-8'>
            <div className='card'>
              <Link className='btn btn-primary btn-sm mb-3' to='/create'>
                  Create New Sacco
                </Link>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <Link className='btn btn-primary btn-sm mb-3' to='/viewSaccos'>
                  View Saccos
                </Link>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <Link className='btn btn-primary btn-sm mb-3' to='/'>
                  Transactions
                </Link>
              </div>
              <br/><br/>
              <div className='card-header'>All Saccos &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <div className='card-body'>
               
                <ul className='list-group list-group-flush'>
                  {saccos.map(sacco => (
                    <Link
                      className='list-group-item list-group-item-action d-flex justify-content-between align-items-center'
                      to={`/${sacco.id}`}
                      key={sacco.id}
                    >
                      {sacco.name}&nbsp;&nbsp;&nbsp;
                      <span className='badge badge-primary badge-pill'>
                        {sacco.country}
                      </span>
                    </Link>
                  ))}
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    )
  }
}

export default SaccosList