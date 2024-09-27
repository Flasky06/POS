import Pagination from "@/Components/Pagination";
import SelectInput from "@/Components/SelectInput";
import TextInput from "@/Components/TextInput";
import {
  PROJECT_STATUS_CLASS_MAP,
  PROJECT_STATUS_TEXT_MAP,
} from "@/Constants.jsx";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import Authenticated from "@/Layouts/AuthenticatedLayout";
import { Head, Link, router } from "@inertiajs/react";

import TableHeading from "@/Components/TableHeading";

export default function Index({ auth, projects, queryParams = null }) {
  queryParams = queryParams || {};

  const searchFieldChanged = (name, value) => {
    if (value) {
      queryParams[name] = value;
    } else {
      delete queryParams[name];
    }

    router.get(route("project.index"), queryParams);
  };

  const onKeyPress = (name, e) => {
    if (e.key !== "Enter") return;
    searchFieldChanged(name, e.target.value);
  };

  const sortChanged = (name) => {
    if (name === queryParams.sort_field) {
      if (queryParams.sort_direction === "asc") {
        queryParams.sort_direction = "desc";
      } else {
        queryParams.sort_direction = "asc";
      }
    } else {
      queryParams.sort_field = name;
      queryParams.sort_direction = "asc";
    }

    router.get(route("project.index"), queryParams);
  };

  return (
    <AuthenticatedLayout
      user={Authenticated.user}
      header={
        <h2 className="font-semibold text-xl text-gray-800 leading-tight">
          Projects
        </h2>
      }
    >
      <Head title="Dashboard" />

      <div className="py-12">
        <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div className="p-6 ">
              <table className="w-full text-sm text-left rtl:text-right ">
                <thead
                  className="text-xs  uppercase border-b-2
                                "
                >
                  <tr className="text-nowrap">
                    <TableHeading
                      name="id"
                      sort_field={queryParams.sort_field}
                      sort_direction={queryParams.sort_direction}
                      sortChanged={sortChanged}
                    >
                      ID
                    </TableHeading>

                    <th onClick={(e) => sortChanged()} className="px-3 py-3">
                      Image
                    </th>

                    <TableHeading
                      name="name"
                      sort_field={queryParams.sort_field}
                      sort_direction={queryParams.sort_direction}
                      sortChanged={sortChanged}
                    >
                      Name
                    </TableHeading>

                    <TableHeading
                      name="status"
                      sort_field={queryParams.sort_field}
                      sort_direction={queryParams.sort_direction}
                      sortChanged={sortChanged}
                    >
                      Status
                    </TableHeading>
                    <TableHeading
                      name="create_data"
                      sort_field={queryParams.sort_field}
                      sort_direction={queryParams.sort_direction}
                      sortChanged={sortChanged}
                    >
                      Create Date
                    </TableHeading>
                    <TableHeading
                      name="due_date"
                      sort_field={queryParams.sort_field}
                      sort_direction={queryParams.sort_direction}
                      sortChanged={sortChanged}
                    >
                      Due Data
                    </TableHeading>
                    <th className="px-3 py-3">Created By</th>
                    <th
                      onClick={(e) => sortChanged()}
                      className="px-3 py-3 text-right"
                    >
                      Action
                    </th>
                  </tr>
                </thead>
                <thead
                  className="text-xs  uppercase border-b-2s
                                "
                >
                  <tr className="text-nowrap">
                    <th className="px-3 py-3"></th>
                    <th className="px-3 py-3"></th>
                    <th className="px-3 py-3">
                      <TextInput
                        className="w-full"
                        defaultValue={queryParams.name}
                        placeholder="Project Name"
                        onBlur={(e) =>
                          searchFieldChanged("name", e.target.value)
                        }
                        onKeyPress={(e) => onKeyPress("name", e)}
                      />
                    </th>
                    <th className="px-3 py-3">
                      <SelectInput
                        className="w-full"
                        defaultValue={queryParams.status}
                        onChange={(e) =>
                          searchFieldChanged("status", e.target.value)
                        }
                      >
                        <option value="">Select Status</option>
                        <option value="pending">Pending</option>
                        <option value="in_progress">In Progress </option>
                        <option value="completed">Completed </option>
                      </SelectInput>
                    </th>
                    <th className="px-3 py-3"></th>
                    <th className="px-3 py-3"> </th>
                    <th className="px-3 py-3"> </th>
                    <th className="px-3 py-3 text-right"></th>
                  </tr>
                </thead>
                <tbody>
                  {projects.data.map((project) => (
                    <tr key={project.id} className="bg-white border-b ">
                      <td className="px-3 pt-2">{project.id}</td>
                      <td className="px-3 pt-2">
                        <img
                          src={project.image_path}
                          alt={project.name}
                          style={{ width: 60 }}
                        />
                      </td>
                      <td className="px-3 py-2 text-nowrap hover:underline hover:underline-offset-2 hover:text-blue-700">
                        <Link href={route("project.show", project.id)}>
                          {project.name}
                        </Link>
                      </td>
                      <td className="px-3 pt-2">
                        <span
                          className={
                            "px-2 py-1 rounded text-white " +
                            PROJECT_STATUS_CLASS_MAP[project.status]
                          }
                        >
                          {PROJECT_STATUS_TEXT_MAP[project.status]}
                        </span>
                      </td>
                      <td className="px-3 pt-2 text-nowrap">
                        {project.created_at}
                      </td>
                      <td className="px-3 pt-2 text-nowrap">
                        {project.due_date}
                      </td>
                      <td className="px-3 pt-2">{project.createdBy.name}</td>
                      <td className="px-3 pt-2">
                        <Link
                          className="font-medium text-blue-600 dark:text-blue-500 hover:underline mx-1"
                          href={route("project.edit", project.id)}
                        >
                          Edit
                        </Link>

                        <Link
                          className="font-medium text-red-600 dark:text-red-500 hover:underline mx-1"
                          href={route("project.destroy", project.id)}
                        >
                          Delete
                        </Link>
                      </td>
                    </tr>
                  ))}
                </tbody>
              </table>
              <Pagination links={projects.meta.links} />
            </div>
          </div>
        </div>
      </div>
    </AuthenticatedLayout>
  );
}
