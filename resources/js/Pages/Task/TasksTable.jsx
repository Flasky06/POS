import React from "react";
import TableHeading from "@/Components/TableHeading";
import Pagination from "@/Components/Pagination";
import SelectInput from "@/Components/SelectInput";
import TextInput from "@/Components/TextInput";
import { TASK_STATUS_CLASS_MAP, TASK_STATUS_TEXT_MAP } from "@/Constants.jsx";
import { Link, router } from "@inertiajs/react";

export default function TasksTable({
  tasks,
  queryParams,
  hideProjectColumn = false,
}) {
  const searchFieldChanged = (name, value) => {
    if (value) {
      queryParams[name] = value;
    } else {
      delete queryParams[name];
    }

    router.get(route("task.index"), queryParams);
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

    router.get(route("task.index"), queryParams);
  };

  return (
    <>
      <div className="overflow-auto">
        <table className="w-full text-sm text-left rtl:text-right ">
          <thead className="text-xs uppercase border-b-2">
            <tr className="text-nowrap">
              <TableHeading
                name="id"
                sort_field={queryParams.sort_field}
                sort_direction={queryParams.sort_direction}
                sortChanged={sortChanged}
              >
                ID
              </TableHeading>
              <th className="px-3 py-3">Image</th>
              {!hideProjectColumn && (
                <th className="px-3 py-3">Project Name</th>
              )}
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
              {!hideProjectColumn && <th className="px-3 py-3"></th>}
              <th className="px-3 py-3">
                <TextInput
                  className="w-full"
                  defaultValue={queryParams.name}
                  placeholder="Task Name"
                  onBlur={(e) => searchFieldChanged("name", e.target.value)}
                  onKeyPress={(e) => onKeyPress("name", e)}
                />
              </th>
              <th className="px-3 py-3">
                <SelectInput
                  className="w-full"
                  defaultValue={queryParams.status}
                  onChange={(e) => searchFieldChanged("status", e.target.value)}
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
            {tasks.data.map((task) => (
              <tr key={task.id} className="bg-white border-b ">
                <td className="px-3 pt-2">{task.id}</td>
                <td className="px-3 pt-2">
                  <img
                    src={task.image_path}
                    alt={task.name}
                    style={{ width: 60 }}
                  />
                </td>
                {!hideProjectColumn && (
                  <td className="px-3 pt-2">{task.project.name}</td>
                )}
                <td className="px-3 pt-2">{task.name}</td>
                <td className="px-3 pt-2">
                  <span
                    className={
                      "px-2 py-1 rounded text-white " +
                      TASK_STATUS_CLASS_MAP[task.status]
                    }
                  >
                    {TASK_STATUS_TEXT_MAP[task.status]}
                  </span>
                </td>
                <td className="px-3 pt-2 text-nowrap">{task.created_at}</td>
                <td className="px-3 pt-2 text-nowrap">{task.due_date}</td>
                <td className="px-3 pt-2">{task.createdBy.name}</td>
                <td className="px-3 pt-2">
                  <Link
                    className="font-medium text-blue-600 dark:text-blue-500 hover:underline mx-1"
                    href={route("task.edit", task.id)}
                  >
                    Edit
                  </Link>

                  <Link
                    className="font-medium text-red-600 dark:text-red-500 hover:underline mx-1"
                    href={route("task.destroy", task.id)}
                  >
                    Delete
                  </Link>
                </td>
              </tr>
            ))}
          </tbody>
        </table>
      </div>
      <Pagination links={tasks.meta.links} />
    </>
  );
}
